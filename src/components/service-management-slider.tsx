import { useState } from "react"
import { Plus, CreditCard as Edit, Trash2, Save, X, ChevronLeft, ChevronRight } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Textarea } from "@/components/ui/textarea"
import { Label } from "@/components/ui/label"
import { Card } from "@/components/ui/card"
import { useToast } from "@/hooks/use-toast"
import { z } from "zod"

// Service validation schema
const serviceSchema = z.object({
  title: z.string().min(1, "Title is required").max(100),
  description: z.string().min(10, "Description must be at least 10 characters").max(500),
  price: z.string().min(1, "Price is required"),
  features: z.array(z.string()).min(1, "At least one feature is required")
})

interface Service {
  id: number
  title: string
  description: string
  price: string
  features: string[]
  icon: string
  popular?: boolean
}

interface ServiceManagementSliderProps {
  initialServices?: Service[]
  onServiceUpdate?: (services: Service[]) => void
  className?: string
}

export function ServiceManagementSlider({ 
  initialServices = [],
  onServiceUpdate,
  className = ""
}: ServiceManagementSliderProps) {
  const [services, setServices] = useState<Service[]>(initialServices)
  const [currentIndex, setCurrentIndex] = useState(0)
  const [isEditing, setIsEditing] = useState(false)
  const [isAdding, setIsAdding] = useState(false)
  const [editingService, setEditingService] = useState<Partial<Service>>({})
  const [newFeature, setNewFeature] = useState("")
  const [isLoading, setIsLoading] = useState(false)
  const { toast } = useToast()

  // Navigation functions
  const nextSlide = () => {
    setCurrentIndex((prev) => (prev + 1) % services.length)
  }

  const prevSlide = () => {
    setCurrentIndex((prev) => (prev - 1 + services.length) % services.length)
  }

  // Service management functions
  const startEditing = (service: Service) => {
    setEditingService({ ...service })
    setIsEditing(true)
  }

  const startAdding = () => {
    setEditingService({
      title: "",
      description: "",
      price: "",
      features: [],
      icon: "🎨"
    })
    setIsAdding(true)
  }

  const cancelEditing = () => {
    setIsEditing(false)
    setIsAdding(false)
    setEditingService({})
    setNewFeature("")
  }

  const addFeature = () => {
    if (newFeature.trim()) {
      setEditingService(prev => ({
        ...prev,
        features: [...(prev.features || []), newFeature.trim()]
      }))
      setNewFeature("")
    }
  }

  const removeFeature = (index: number) => {
    setEditingService(prev => ({
      ...prev,
      features: prev.features?.filter((_, i) => i !== index) || []
    }))
  }

  const saveService = async () => {
    try {
      // Validate the service data
      serviceSchema.parse(editingService)
      
      setIsLoading(true)

      // Simulate API call to backend
      await new Promise(resolve => setTimeout(resolve, 1000))

      if (isAdding) {
        // Add new service
        const newService: Service = {
          ...editingService as Service,
          id: Date.now() // In production, this would come from the backend
        }
        const updatedServices = [...services, newService]
        setServices(updatedServices)
        onServiceUpdate?.(updatedServices)
        
        toast({
          title: "Service Added Successfully!",
          description: `${newService.title} has been added to your services.`
        })
      } else {
        // Update existing service
        const updatedServices = services.map(service => 
          service.id === editingService.id ? { ...editingService as Service } : service
        )
        setServices(updatedServices)
        onServiceUpdate?.(updatedServices)
        
        toast({
          title: "Service Updated Successfully!",
          description: `${editingService.title} has been updated.`
        })
      }

      cancelEditing()
    } catch (error) {
      if (error instanceof z.ZodError) {
        toast({
          title: "Validation Error",
          description: error.errors[0].message,
          variant: "destructive"
        })
      } else {
        toast({
          title: "Error",
          description: "Failed to save service. Please try again.",
          variant: "destructive"
        })
      }
    } finally {
      setIsLoading(false)
    }
  }

  const deleteService = async (serviceId: number) => {
    if (!confirm("Are you sure you want to delete this service?")) return

    try {
      setIsLoading(true)
      
      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 500))
      
      const updatedServices = services.filter(service => service.id !== serviceId)
      setServices(updatedServices)
      onServiceUpdate?.(updatedServices)
      
      // Adjust current index if necessary
      if (currentIndex >= updatedServices.length) {
        setCurrentIndex(Math.max(0, updatedServices.length - 1))
      }
      
      toast({
        title: "Service Deleted",
        description: "The service has been removed successfully."
      })
    } catch (error) {
      toast({
        title: "Error",
        description: "Failed to delete service. Please try again.",
        variant: "destructive"
      })
    } finally {
      setIsLoading(false)
    }
  }

  if (services.length === 0 && !isAdding) {
    return (
      <div className={`text-center py-12 ${className}`}>
        <div className="max-w-md mx-auto">
          <div className="w-16 h-16 bg-gradient-youtube rounded-full flex items-center justify-center mx-auto mb-4">
            <Plus className="h-8 w-8 text-white" />
          </div>
          <h3 className="text-xl font-semibold text-foreground mb-2">No Services Yet</h3>
          <p className="text-muted-foreground mb-6">
            Start by adding your first service to showcase your offerings.
          </p>
          <Button onClick={startAdding} className="bg-gradient-youtube hover:shadow-glow">
            <Plus className="h-4 w-4 mr-2" />
            Add Your First Service
          </Button>
        </div>
      </div>
    )
  }

  return (
    <div className={`relative ${className}`}>
      {/* Service Slider */}
      <div className="relative overflow-hidden">
        <div 
          className="flex transition-transform duration-500 ease-in-out"
          style={{ transform: `translateX(-${currentIndex * 100}%)` }}
        >
          {services.map((service, index) => (
            <div key={service.id} className="w-full flex-shrink-0 px-4">
              <Card className="relative p-6 bg-gradient-subtle border border-border hover:border-youtube-red/30 transition-all duration-300">
                {service.popular && (
                  <div className="absolute -top-3 left-1/2 transform -translate-x-1/2">
                    <span className="bg-gradient-youtube text-white px-4 py-1 rounded-full text-sm font-medium">
                      Most Popular
                    </span>
                  </div>
                )}

                <div className="text-center">
                  <div className="text-4xl mb-4">{service.icon}</div>
                  <h3 className="text-xl font-semibold text-foreground mb-3">{service.title}</h3>
                  <p className="text-muted-foreground mb-4">{service.description}</p>
                  
                  <div className="space-y-2 mb-6">
                    {service.features.map((feature, featureIndex) => (
                      <div key={featureIndex} className="flex items-center justify-center space-x-2">
                        <div className="w-2 h-2 bg-youtube-red rounded-full"></div>
                        <span className="text-sm text-muted-foreground">{feature}</span>
                      </div>
                    ))}
                  </div>
                  
                  <div className="text-2xl font-bold text-foreground mb-6">{service.price}</div>
                  
                  <div className="flex space-x-2">
                    <Button 
                      onClick={() => startEditing(service)}
                      variant="outline"
                      size="sm"
                      className="flex-1"
                    >
                      <Edit className="h-4 w-4 mr-2" />
                      Edit
                    </Button>
                    <Button 
                      onClick={() => deleteService(service.id)}
                      variant="outline"
                      size="sm"
                      className="text-red-600 hover:bg-red-600 hover:text-white"
                      disabled={isLoading}
                    >
                      <Trash2 className="h-4 w-4" />
                    </Button>
                  </div>
                </div>
              </Card>
            </div>
          ))}
        </div>

        {/* Navigation arrows */}
        {services.length > 1 && (
          <>
            <Button
              onClick={prevSlide}
              variant="outline"
              size="icon"
              className="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white shadow-lg"
              aria-label="Previous service"
            >
              <ChevronLeft className="h-4 w-4" />
            </Button>
            <Button
              onClick={nextSlide}
              variant="outline"
              size="icon"
              className="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white shadow-lg"
              aria-label="Next service"
            >
              <ChevronRight className="h-4 w-4" />
            </Button>
          </>
        )}

        {/* Slide indicators */}
        {services.length > 1 && (
          <div className="flex justify-center space-x-2 mt-6">
            {services.map((_, index) => (
              <button
                key={index}
                onClick={() => setCurrentIndex(index)}
                className={`w-3 h-3 rounded-full transition-colors ${
                  index === currentIndex ? 'bg-youtube-red' : 'bg-muted'
                }`}
                aria-label={`Go to service ${index + 1}`}
              />
            ))}
          </div>
        )}
      </div>

      {/* Add Service Button */}
      <div className="text-center mt-8">
        <Button 
          onClick={startAdding}
          className="bg-gradient-youtube hover:shadow-glow"
          disabled={isLoading}
        >
          <Plus className="h-4 w-4 mr-2" />
          Add New Service
        </Button>
      </div>

      {/* Edit/Add Service Modal */}
      {(isEditing || isAdding) && (
        <div className="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
          <Card className="w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div className="p-6">
              <div className="flex items-center justify-between mb-6">
                <h3 className="text-xl font-semibold text-foreground">
                  {isAdding ? "Add New Service" : "Edit Service"}
                </h3>
                <Button
                  onClick={cancelEditing}
                  variant="ghost"
                  size="sm"
                  className="h-8 w-8 p-0"
                >
                  <X className="h-4 w-4" />
                </Button>
              </div>

              <div className="space-y-6">
                {/* Service Title */}
                <div className="space-y-2">
                  <Label htmlFor="service-title">Service Title *</Label>
                  <Input
                    id="service-title"
                    value={editingService.title || ""}
                    onChange={(e) => setEditingService(prev => ({ ...prev, title: e.target.value }))}
                    placeholder="e.g., Logo Design"
                  />
                </div>

                {/* Service Description */}
                <div className="space-y-2">
                  <Label htmlFor="service-description">Description *</Label>
                  <Textarea
                    id="service-description"
                    value={editingService.description || ""}
                    onChange={(e) => setEditingService(prev => ({ ...prev, description: e.target.value }))}
                    placeholder="Describe what this service offers..."
                    rows={3}
                  />
                </div>

                {/* Service Price */}
                <div className="space-y-2">
                  <Label htmlFor="service-price">Price *</Label>
                  <Input
                    id="service-price"
                    value={editingService.price || ""}
                    onChange={(e) => setEditingService(prev => ({ ...prev, price: e.target.value }))}
                    placeholder="e.g., From $149"
                  />
                </div>

                {/* Service Icon */}
                <div className="space-y-2">
                  <Label htmlFor="service-icon">Icon (Emoji)</Label>
                  <Input
                    id="service-icon"
                    value={editingService.icon || ""}
                    onChange={(e) => setEditingService(prev => ({ ...prev, icon: e.target.value }))}
                    placeholder="🎨"
                    maxLength={2}
                  />
                </div>

                {/* Features */}
                <div className="space-y-2">
                  <Label>Features *</Label>
                  <div className="space-y-2">
                    {editingService.features?.map((feature, index) => (
                      <div key={index} className="flex items-center space-x-2">
                        <Input
                          value={feature}
                          onChange={(e) => {
                            const updatedFeatures = [...(editingService.features || [])]
                            updatedFeatures[index] = e.target.value
                            setEditingService(prev => ({ ...prev, features: updatedFeatures }))
                          }}
                          className="flex-1"
                        />
                        <Button
                          onClick={() => removeFeature(index)}
                          variant="outline"
                          size="sm"
                          className="text-red-600 hover:bg-red-600 hover:text-white"
                        >
                          <Trash2 className="h-4 w-4" />
                        </Button>
                      </div>
                    ))}
                    
                    <div className="flex items-center space-x-2">
                      <Input
                        value={newFeature}
                        onChange={(e) => setNewFeature(e.target.value)}
                        placeholder="Add a feature..."
                        onKeyPress={(e) => e.key === 'Enter' && addFeature()}
                      />
                      <Button
                        onClick={addFeature}
                        variant="outline"
                        size="sm"
                        disabled={!newFeature.trim()}
                      >
                        <Plus className="h-4 w-4" />
                      </Button>
                    </div>
                  </div>
                </div>

                {/* Popular toggle */}
                <div className="flex items-center space-x-2">
                  <input
                    type="checkbox"
                    id="service-popular"
                    checked={editingService.popular || false}
                    onChange={(e) => setEditingService(prev => ({ ...prev, popular: e.target.checked }))}
                    className="rounded border-border"
                  />
                  <Label htmlFor="service-popular">Mark as "Most Popular"</Label>
                </div>

                {/* Action buttons */}
                <div className="flex space-x-3 pt-4">
                  <Button
                    onClick={saveService}
                    disabled={isLoading}
                    className="flex-1 bg-gradient-youtube hover:shadow-glow"
                  >
                    {isLoading ? (
                      <>
                        <div className="animate-spin rounded-full h-4 w-4 border-b-2 border-white mr-2"></div>
                        Saving...
                      </>
                    ) : (
                      <>
                        <Save className="h-4 w-4 mr-2" />
                        {isAdding ? "Add Service" : "Save Changes"}
                      </>
                    )}
                  </Button>
                  <Button
                    onClick={cancelEditing}
                    variant="outline"
                    disabled={isLoading}
                    className="flex-1"
                  >
                    Cancel
                  </Button>
                </div>
              </div>
            </div>
          </Card>
        </div>
      )}
    </div>
  )
}