import { Palette, Play, Zap, CircleCheck as CheckCircle } from "lucide-react"
import { Button } from "@/components/ui/button"
import { ServiceManagementSlider } from "@/components/service-management-slider"
import { useServices } from "@/hooks/use-services"

const iconMap: { [key: string]: any } = {
  "🎨": Palette,
  "📺": Play,
  "🎬": Zap,
  "🚀": Zap
}

export function ServicesOverview() {
  const { services, isLoading } = useServices()

  if (isLoading) {
    return (
      <section className="py-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center">
            <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-youtube-red mx-auto"></div>
            <p className="text-muted-foreground mt-4">Loading services...</p>
          </div>
        </div>
      </section>
    )
  }

  return (
    <section className="py-20">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Section header */}
        <div className="text-center mb-16">
          <h2 className="text-3xl sm:text-4xl font-bold text-foreground mb-4">
            Services That <span className="text-gradient-youtube">Drive Results</span>
          </h2>
          <p className="text-xl text-muted-foreground max-w-2xl mx-auto">
            Professional design services tailored to grow your business and increase conversions.
          </p>
        </div>

        {/* Services grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8" id="services-grid">
          {services.map((service) => {
            const Icon = iconMap[service.icon] || Palette
            return (
              <div 
                key={service.title}
                className={`relative card-premium ${service.popular ? 'ring-2 ring-youtube-red' : ''}`}
              >
                {service.popular && (
                  <div className="absolute -top-3 left-1/2 transform -translate-x-1/2">
                    <span className="bg-gradient-youtube text-white px-4 py-1 rounded-full text-sm font-medium">
                      Most Popular
                    </span>
                  </div>
                )}

                <div className="text-center">
                  <div className="inline-flex items-center justify-center w-16 h-16 bg-gradient-youtube rounded-xl mb-6">
                    <Icon className="h-8 w-8 text-white" />
                  </div>
                  
                  <h3 className="text-xl font-semibold text-foreground mb-3">{service.title}</h3>
                  <p className="text-muted-foreground mb-6">{service.description}</p>
                  
                  <div className="space-y-3 mb-8">
                    {service.features.map((feature) => (
                      <div key={feature} className="flex items-center justify-center space-x-2">
                        <CheckCircle className="h-4 w-4 text-youtube-red" />
                        <span className="text-sm text-muted-foreground">{feature}</span>
                      </div>
                    ))}
                  </div>
                  
                  <div className="text-2xl font-bold text-foreground mb-6">{service.price}</div>
                  
                  <Button 
                    className={`w-full font-medium ${
                      service.popular 
                        ? 'bg-gradient-youtube hover:shadow-glow' 
                        : 'variant-outline border-youtube-red text-youtube-red hover:bg-youtube-red hover:text-white'
                    } transition-all duration-300`}
                  >
                    Get Started
                  </Button>
                </div>
              </div>
            )
          })}
        </div>

        {/* Service Management Slider for Admin */}
        <div className="mt-16">
          <div className="text-center mb-8">
            <h3 className="text-2xl font-bold text-foreground mb-2">
              Manage <span className="text-gradient-youtube">Services</span>
            </h3>
            <p className="text-muted-foreground">
              Add, edit, or remove services with the interactive slider below
            </p>
          </div>
          <ServiceManagementSlider 
            initialServices={services}
            onServiceUpdate={(updatedServices) => {
              // In production, this would sync with the backend
              console.log('Services updated:', updatedServices)
            }}
          />
        </div>

        {/* Bottom CTA */}
        <div className="text-center mt-16 p-8 bg-gradient-subtle rounded-2xl">
          <h3 className="text-2xl font-bold text-foreground mb-4">
            Need a Custom Package?
          </h3>
          <p className="text-muted-foreground mb-6">
            Let's discuss your project and create a tailored solution that fits your needs and budget.
          </p>
          <Button 
            size="lg"
            className="bg-gradient-youtube hover:shadow-glow transition-all duration-300 font-semibold px-8 py-4"
          >
            Schedule Free Consultation
          </Button>
        </div>
      </div>
    </section>
  )
}