import { useState, useEffect } from "react"
import { Settings, Plus, CreditCard as Edit, Trash2, Save, X, Eye, EyeOff } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Card } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Textarea } from "@/components/ui/textarea"
import { Label } from "@/components/ui/label"
import { Switch } from "@/components/ui/switch"
import { useToast } from "@/hooks/use-toast"
import { ServiceManagementSlider } from "@/components/service-management-slider"

interface AdminServicePanelProps {
  isVisible?: boolean
  onToggle?: () => void
}

export function AdminServicePanel({ isVisible = false, onToggle }: AdminServicePanelProps) {
  const [isOpen, setIsOpen] = useState(isVisible)
  const [services, setServices] = useState([])
  const [isLoading, setIsLoading] = useState(false)
  const { toast } = useToast()

  useEffect(() => {
    setIsOpen(isVisible)
  }, [isVisible])

  const handleServiceUpdate = async (updatedServices: any[]) => {
    try {
      setIsLoading(true)
      
      // Simulate API call to update services
      await new Promise(resolve => setTimeout(resolve, 1000))
      
      setServices(updatedServices)
      
      toast({
        title: "Services Updated",
        description: "All service changes have been saved successfully."
      })
    } catch (error) {
      toast({
        title: "Update Failed",
        description: "Failed to update services. Please try again.",
        variant: "destructive"
      })
    } finally {
      setIsLoading(false)
    }
  }

  const togglePanel = () => {
    setIsOpen(!isOpen)
    onToggle?.()
  }

  return (
    <>
      {/* Admin Toggle Button */}
      <div className="fixed top-24 right-6 z-40">
        <Button
          onClick={togglePanel}
          variant="outline"
          size="sm"
          className="bg-white/90 backdrop-blur-sm shadow-lg hover:shadow-xl transition-all duration-300"
          aria-label="Toggle admin service panel"
        >
          <Settings className="h-4 w-4 mr-2" />
          {isOpen ? "Hide" : "Manage"} Services
          {isOpen ? <EyeOff className="h-4 w-4 ml-2" /> : <Eye className="h-4 w-4 ml-2" />}
        </Button>
      </div>

      {/* Admin Panel Overlay */}
      {isOpen && (
        <div className="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
          <Card className="w-full max-w-6xl max-h-[90vh] overflow-y-auto">
            <div className="p-6">
              {/* Panel Header */}
              <div className="flex items-center justify-between mb-6">
                <div>
                  <h2 className="text-2xl font-bold text-foreground">Service Management</h2>
                  <p className="text-muted-foreground">
                    Add, edit, and organize your services with the interactive slider
                  </p>
                </div>
                <Button
                  onClick={togglePanel}
                  variant="ghost"
                  size="sm"
                  className="h-8 w-8 p-0"
                >
                  <X className="h-4 w-4" />
                </Button>
              </div>

              {/* Service Management Slider */}
              <div className="bg-gradient-subtle rounded-xl p-6">
                <ServiceManagementSlider
                  initialServices={services}
                  onServiceUpdate={handleServiceUpdate}
                />
              </div>

              {/* Admin Actions */}
              <div className="mt-6 flex items-center justify-between">
                <div className="text-sm text-muted-foreground">
                  {services.length} service{services.length !== 1 ? 's' : ''} configured
                </div>
                <div className="flex space-x-3">
                  <Button
                    variant="outline"
                    onClick={() => {
                      // Export services configuration
                      const dataStr = JSON.stringify(services, null, 2)
                      const dataBlob = new Blob([dataStr], { type: 'application/json' })
                      const url = URL.createObjectURL(dataBlob)
                      const link = document.createElement('a')
                      link.href = url
                      link.download = 'services-config.json'
                      link.click()
                      URL.revokeObjectURL(url)
                    }}
                  >
                    Export Config
                  </Button>
                  <Button
                    onClick={togglePanel}
                    className="bg-gradient-youtube hover:shadow-glow"
                  >
                    Save & Close
                  </Button>
                </div>
              </div>
            </div>
          </Card>
        </div>
      )}
    </>
  )
}