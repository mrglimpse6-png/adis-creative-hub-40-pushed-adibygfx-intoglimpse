<?php
/**
 * Services Page - Dynamic PHP Template
 * Displays services and pricing information
 */

// Page configuration
$page_title = "Services & Pricing - Logo Design, YouTube Thumbnails, Video Editing";
$page_description = "Professional design services including logo design starting at $149, YouTube thumbnails at $25, and video editing packages. 24-48 hour delivery guaranteed.";
$page_keywords = "logo design services, youtube thumbnail design, video editing services, graphic design pricing, professional design packages";
$canonical_url = "https://adilgfx.com/services";

// Include header
include __DIR__ . '/includes/header.php';
?>

<main class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                Services & <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">Pricing</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-4">
                Professional design services with transparent pricing. Choose the package that fits your needs, 
                or contact me for a custom solution.
            </p>
            <p class="text-lg text-red-600 font-medium">
                💬 Pricing depends on your specific project requirements. Chat with me for a free personalized quote!
            </p>
        </div>

        <!-- Logo Design Service -->
        <div id="logo" class="mb-20 border-b border-gray-200 pb-20">
            <div class="text-center mb-12">
                <div class="text-6xl mb-4">🎨</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Logo Design</h2>
                <p class="text-lg text-red-600 font-medium mb-4">Professional Brand Identity</p>
                <p class="text-gray-600 max-w-2xl mx-auto">Create a memorable logo that builds trust and recognition for your brand.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Basic Package -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Basic Logo</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $149</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 2-3 days</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">1 Logo concept</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">2 Revisions included</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">PNG & JPG files</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Basic style guide</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=logo-basic" class="block w-full border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-3 rounded-lg font-medium transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Standard Package -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border-2 border-red-500 relative">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-4 py-1 rounded-full text-sm font-medium">
                            Most Popular
                        </span>
                    </div>

                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Standard Logo</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $249</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 3-5 days</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">3 Logo concepts</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">5 Revisions included</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">All file formats (PNG, JPG, SVG, AI)</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Detailed style guide</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Social media kit</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=logo-standard" class="block w-full bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Premium Package -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Premium Brand</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $449</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 5-7 days</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">5 Logo concepts</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Unlimited revisions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Complete file package</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Brand guidelines</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Business card design</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=logo-premium" class="block w-full border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-3 rounded-lg font-medium transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- YouTube Thumbnails Service -->
        <div id="thumbnails" class="mb-20 border-b border-gray-200 pb-20">
            <div class="text-center mb-12">
                <div class="text-6xl mb-4">📺</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">YouTube Thumbnails</h2>
                <p class="text-lg text-red-600 font-medium mb-4">High-Converting Click Magnets</p>
                <p class="text-gray-600 max-w-2xl mx-auto">Eye-catching thumbnails that boost your CTR and grow your channel.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Single Thumbnail -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Single Thumbnail</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $49</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 24 hours</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">1 Custom thumbnail</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">2 Revisions included</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">High-resolution files</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Mobile optimized</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=thumbnail-single" class="block w-full border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-3 rounded-lg font-medium transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Thumbnail Pack -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border-2 border-red-500 relative">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-4 py-1 rounded-full text-sm font-medium">
                            Most Popular
                        </span>
                    </div>

                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Thumbnail Pack</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $199</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 2-3 days</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">5 Custom thumbnails</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">3 Revisions per thumbnail</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Multiple format options</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">A/B testing versions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Template variations</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=thumbnail-pack" class="block w-full bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Monthly Package -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Monthly Package</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $799</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ Ongoing</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">20 Custom thumbnails</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Unlimited revisions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Priority support</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Performance analytics</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Custom thumbnail strategy</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=thumbnail-monthly" class="block w-full border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-3 rounded-lg font-medium transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Editing Service -->
        <div id="video" class="mb-20">
            <div class="text-center mb-12">
                <div class="text-6xl mb-4">🎬</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Video Editing</h2>
                <p class="text-lg text-red-600 font-medium mb-4">Professional Video Production</p>
                <p class="text-gray-600 max-w-2xl mx-auto">Transform raw footage into engaging videos that keep viewers watching.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Basic Edit -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Basic Edit</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $299</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 3-5 days</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Up to 10 minutes</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Basic color correction</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Simple transitions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Background music</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=video-basic" class="block w-full border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-3 rounded-lg font-medium transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Professional Edit -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border-2 border-red-500 relative">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-4 py-1 rounded-full text-sm font-medium">
                            Most Popular
                        </span>
                    </div>

                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Professional Edit</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $599</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 5-7 days</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Up to 20 minutes</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Advanced color grading</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Motion graphics</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Custom animations</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Sound design</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=video-professional" class="block w-full bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Premium Production -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Premium Production</h3>
                        <div class="text-3xl font-bold text-gray-900 mb-2">Starting at $1,299</div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600 mb-6">
                            <span class="text-sm">⏱️ 7-10 days</span>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Up to 60 minutes</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Cinematic color grading</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Advanced motion graphics</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Custom animations & effects</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600 text-left">Multiple format delivery</span>
                            </div>
                        </div>

                        <a href="/contact.php?service=video-premium" class="block w-full border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-3 rounded-lg font-medium transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA section -->
        <div class="text-center">
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-8 shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    Not Sure Which Package to Choose?
                </h2>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    Pricing depends on your specific project requirements. Chat with me for a free personalized quote that fits your budget and timeline perfectly.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="/contact.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                        Get Custom Quote
                    </a>
                    <a href="https://wa.me/1234567890" target="_blank" class="inline-flex items-center px-8 py-4 border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-semibold rounded-lg transition-all duration-300">
                        Schedule Free Call
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>