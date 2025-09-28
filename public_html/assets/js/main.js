/**
 * Main JavaScript File
 * Handles dynamic functionality and API interactions
 */

// Portfolio functionality
class PortfolioManager {
    constructor() {
        this.apiBase = '/backend/api';
        this.currentCategory = 'All';
        this.projects = [];
        this.init();
    }

    init() {
        this.bindEvents();
        this.loadProjects();
    }

    bindEvents() {
        // Category filter buttons
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('category-filter')) {
                e.preventDefault();
                const category = e.target.dataset.category;
                this.filterByCategory(category);
            }
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    }

    async loadProjects(category = 'All') {
        try {
            const url = `${this.apiBase}/get_projects.php${category !== 'All' ? `?category=${encodeURIComponent(category)}` : ''}`;
            const response = await fetch(url);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            if (data.success) {
                this.projects = data.data.projects;
                this.renderProjects();
                this.updateStats(data.data.stats);
            } else {
                console.error('API Error:', data.error);
                this.showError('Failed to load portfolio projects');
            }
        } catch (error) {
            console.error('Error loading projects:', error);
            this.showError('Failed to load portfolio projects');
        }
    }

    filterByCategory(category) {
        this.currentCategory = category;
        this.loadProjects(category);
        
        // Update active filter button
        document.querySelectorAll('.category-filter').forEach(btn => {
            btn.classList.remove('active');
        });
        document.querySelector(`[data-category="${category}"]`)?.classList.add('active');
    }

    renderProjects() {
        const container = document.getElementById('portfolio-grid');
        if (!container) return;

        if (this.projects.length === 0) {
            container.innerHTML = `
                <div class="col-span-full text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl">🎨</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No Projects Found</h3>
                    <p class="text-gray-600">No projects found for the selected category.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = this.projects.map(project => `
            <div class="portfolio-item bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-500 group">
                <div class="relative aspect-video bg-gray-200">
                    <img 
                        src="${this.escapeHtml(project.featured_image_path)}" 
                        alt="${this.escapeHtml(project.featured_image_alt || project.title)}"
                        class="w-full h-full object-cover"
                        loading="lazy"
                        onerror="this.src='/api/placeholder/600/400'"
                    >
                    <div class="portfolio-overlay">
                        <div class="text-white">
                            <h3 class="text-lg font-semibold mb-2">${this.escapeHtml(project.title)}</h3>
                            <div class="flex items-center space-x-2">
                                <button class="bg-white/20 text-white px-3 py-1 rounded text-sm hover:bg-white/30 transition-colors">
                                    👁️ View Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-3">
                        ${project.tags ? project.tags.slice(0, 3).map(tag => `
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-md font-medium">
                                ${this.escapeHtml(tag)}
                            </span>
                        `).join('') : ''}
                    </div>
                    
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">${this.escapeHtml(project.title)}</h3>
                    <p class="text-gray-600 text-sm mb-3">${this.escapeHtml(project.description)}</p>
                    
                    ${project.results_achieved ? `
                        <div class="bg-red-50 text-red-600 px-3 py-2 rounded-lg text-sm font-medium">
                            📈 ${this.escapeHtml(project.results_achieved)}
                        </div>
                    ` : ''}
                </div>
            </div>
        `).join('');
    }

    updateStats(stats) {
        // Update any statistics displays on the page
        const totalProjectsEl = document.getElementById('total-projects');
        if (totalProjectsEl && stats.total_projects) {
            totalProjectsEl.textContent = stats.total_projects;
        }
    }

    showError(message) {
        const container = document.getElementById('portfolio-grid');
        if (container) {
            container.innerHTML = `
                <div class="col-span-full text-center py-16">
                    <div class="w-24 h-24 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl text-red-500">⚠️</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Error Loading Projects</h3>
                    <p class="text-gray-600 mb-4">${this.escapeHtml(message)}</p>
                    <button onclick="portfolioManager.loadProjects()" class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        Try Again
                    </button>
                </div>
            `;
        }
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
}

// Form handling
class FormHandler {
    constructor() {
        this.bindEvents();
    }

    bindEvents() {
        // Contact form submission
        const contactForm = document.getElementById('contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', this.handleContactForm.bind(this));
        }

        // Newsletter subscription
        const newsletterForm = document.getElementById('newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', this.handleNewsletterForm.bind(this));
        }
    }

    async handleContactForm(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const submitButton = e.target.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        
        // Show loading state
        submitButton.textContent = 'Sending...';
        submitButton.disabled = true;
        
        try {
            const response = await fetch('/backend/api/forms/submit', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                this.showMessage('Message sent successfully! I\'ll get back to you within 24 hours.', 'success');
                e.target.reset();
            } else {
                this.showMessage(result.message || 'Failed to send message. Please try again.', 'error');
            }
        } catch (error) {
            console.error('Form submission error:', error);
            this.showMessage('Failed to send message. Please try again.', 'error');
        } finally {
            submitButton.textContent = originalText;
            submitButton.disabled = false;
        }
    }

    async handleNewsletterForm(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const submitButton = e.target.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        
        submitButton.textContent = 'Subscribing...';
        submitButton.disabled = true;
        
        try {
            const response = await fetch('/backend/api/forms/submit', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                this.showMessage('Successfully subscribed! Check your email for a welcome message.', 'success');
                e.target.reset();
            } else {
                this.showMessage(result.message || 'Failed to subscribe. Please try again.', 'error');
            }
        } catch (error) {
            console.error('Newsletter subscription error:', error);
            this.showMessage('Failed to subscribe. Please try again.', 'error');
        } finally {
            submitButton.textContent = originalText;
            submitButton.disabled = false;
        }
    }

    showMessage(message, type) {
        // Create message element
        const messageEl = document.createElement('div');
        messageEl.className = `${type === 'success' ? 'success-message' : 'error-message'} fixed top-4 right-4 z-50 max-w-md`;
        messageEl.textContent = message;
        
        // Add to page
        document.body.appendChild(messageEl);
        
        // Remove after 5 seconds
        setTimeout(() => {
            messageEl.remove();
        }, 5000);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize portfolio manager if on portfolio page
    if (document.getElementById('portfolio-grid')) {
        window.portfolioManager = new PortfolioManager();
    }
    
    // Initialize form handler
    window.formHandler = new FormHandler();
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Utility functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Export for global access
window.PortfolioManager = PortfolioManager;
window.FormHandler = FormHandler;