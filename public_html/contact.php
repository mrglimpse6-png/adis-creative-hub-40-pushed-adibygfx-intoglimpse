<?php
/**
 * Contact Page - Dynamic PHP Template
 * Handles contact form display and submission
 */

// Page configuration
$page_title = "Contact Adil GFX - Get Your Design Project Started Today";
$page_description = "Ready to transform your brand? Contact professional designer Adil for logo design, YouTube thumbnails, and video editing. Free consultation and 24-hour response guaranteed.";
$page_keywords = "contact designer, hire logo designer, youtube thumbnail designer, video editor contact, design consultation, professional design services";
$canonical_url = "https://adilgfx.com/contact";

// Get pre-selected service from URL parameter
$selected_service = $_GET['service'] ?? '';
$estimated_price = $_GET['estimate'] ?? '';

// Include header
include __DIR__ . '/includes/header.php';
?>

<main class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                Let's Create Something <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">Amazing</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Ready to transform your brand? Get in touch and let's discuss how we can bring your vision to life.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact info -->
            <div class="space-y-8">
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Get In Touch</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center">
                                <span class="text-white">📧</span>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">Email</div>
                                <a href="mailto:hello@adilgfx.com" class="text-gray-600 hover:text-red-500 transition-colors">
                                    hello@adilgfx.com
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center">
                                <span class="text-white">📱</span>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">WhatsApp</div>
                                <a href="https://wa.me/1234567890" target="_blank" class="text-gray-600 hover:text-red-500 transition-colors">
                                    Quick Chat Available
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center">
                                <span class="text-white">⏰</span>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">Response Time</div>
                                <div class="text-gray-600">Within 24 hours</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <a href="https://wa.me/1234567890" target="_blank" class="block w-full bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 rounded-lg font-medium text-center hover:shadow-lg transition-all duration-300">
                            💬 Quick WhatsApp Chat
                        </a>
                    </div>
                </div>

                <!-- What to expect -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">What to Expect</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <span class="text-green-500 mt-1">✅</span>
                            <div>
                                <div class="font-medium text-gray-900">Free Consultation</div>
                                <div class="text-sm text-gray-600">
                                    I'll discuss your project needs and provide expert advice at no cost.
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <span class="text-green-500 mt-1">✅</span>
                            <div>
                                <div class="font-medium text-gray-900">Custom Proposal</div>
                                <div class="text-sm text-gray-600">
                                    Detailed project timeline, pricing, and deliverables tailored to your needs.
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <span class="text-green-500 mt-1">✅</span>
                            <div>
                                <div class="font-medium text-gray-900">Fast Turnaround</div>
                                <div class="text-sm text-gray-600">
                                    Most projects completed within 24-48 hours of approval.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Project Details</h3>
                    
                    <form id="contact-form" method="POST" action="/backend/api/forms.php" class="space-y-6">
                        <input type="hidden" name="form_type" value="contact">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name *</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                    placeholder="Your full name"
                                >
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address *</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                    placeholder="your.email@example.com"
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="service" class="block text-sm font-medium text-gray-700">Service Needed *</label>
                                <select 
                                    id="service" 
                                    name="service" 
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                >
                                    <option value="">Select a service</option>
                                    <option value="logo-design" <?php echo $selected_service === 'logo-basic' || $selected_service === 'logo-standard' || $selected_service === 'logo-premium' ? 'selected' : ''; ?>>Logo Design</option>
                                    <option value="youtube-thumbnails" <?php echo strpos($selected_service, 'thumbnail') !== false ? 'selected' : ''; ?>>YouTube Thumbnails</option>
                                    <option value="video-editing" <?php echo strpos($selected_service, 'video') !== false ? 'selected' : ''; ?>>Video Editing</option>
                                    <option value="youtube-branding">YouTube Channel Setup</option>
                                    <option value="complete-package">Complete Branding Package</option>
                                    <option value="consultation">Consultation Only</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label for="budget" class="block text-sm font-medium text-gray-700">Budget Range *</label>
                                <select 
                                    id="budget" 
                                    name="budget" 
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                >
                                    <option value="">Select budget range</option>
                                    <option value="under-500">Under $500</option>
                                    <option value="500-1000">$500 - $1,000</option>
                                    <option value="1000-2500">$1,000 - $2,500</option>
                                    <option value="2500-5000">$2,500 - $5,000</option>
                                    <option value="5000-plus">$5,000+</option>
                                    <option value="not-sure">Not sure yet</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="timeline" class="block text-sm font-medium text-gray-700">Project Timeline *</label>
                            <select 
                                id="timeline" 
                                name="timeline" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            >
                                <option value="">When do you need this completed?</option>
                                <option value="asap">ASAP (Rush fee applies)</option>
                                <option value="1-week">Within 1 week</option>
                                <option value="2-weeks">Within 2 weeks</option>
                                <option value="1-month">Within 1 month</option>
                                <option value="flexible">I'm flexible</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-medium text-gray-700">Project Details *</label>
                            <textarea
                                id="message"
                                name="message"
                                required
                                rows="6"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                placeholder="Tell me about your project, vision, target audience, and any specific requirements..."
                            ></textarea>
                        </div>

                        <?php if ($estimated_price): ?>
                            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                <p class="text-sm text-red-700">
                                    <strong>Estimated Price:</strong> $<?php echo htmlspecialchars($estimated_price); ?>
                                    <br><small>This is an estimate based on your selections. Final price may vary based on specific requirements.</small>
                                </p>
                            </div>
                        <?php endif; ?>

                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 px-6 rounded-lg font-semibold hover:shadow-lg transition-all duration-300"
                        >
                            📨 Send Message
                        </button>

                        <p class="text-sm text-gray-600 text-center">
                            I typically respond within 24 hours. For urgent projects, 
                            <a href="https://wa.me/1234567890" target="_blank" class="text-red-500 hover:underline">
                                WhatsApp me directly
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- FAQ section -->
        <div class="mt-20">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Common <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">Questions</span>
                </h2>
                <p class="text-gray-600">Quick answers to help you get started</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-6 shadow-sm">
                    <h4 class="font-semibold text-gray-900 mb-2">How fast can you deliver?</h4>
                    <p class="text-sm text-gray-600">
                        Most logos and thumbnails are completed within 24-48 hours. Video editing takes 3-7 days depending on complexity.
                    </p>
                </div>
                
                <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-6 shadow-sm">
                    <h4 class="font-semibold text-gray-900 mb-2">Do you offer revisions?</h4>
                    <p class="text-sm text-gray-600">
                        Yes! All packages include 2-5 free revisions. I want to make sure you're 100% satisfied with the final result.
                    </p>
                </div>
                
                <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl p-6 shadow-sm">
                    <h4 class="font-semibold text-gray-900 mb-2">What file formats do you provide?</h4>
                    <p class="text-sm text-gray-600">
                        You'll receive high-resolution PNG, JPG files, and source files (PSD/AI) for full commercial use.
                    </p>
                </div>
            </div>
        </div>

        <!-- Social proof -->
        <div class="mt-16 text-center">
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-8 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <div class="text-3xl font-bold text-gray-900">500+</div>
                        <div class="text-gray-600">Happy Clients</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-gray-900">24-48h</div>
                        <div class="text-gray-600">Average Delivery</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-gray-900">5.0★</div>
                        <div class="text-gray-600">Client Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>