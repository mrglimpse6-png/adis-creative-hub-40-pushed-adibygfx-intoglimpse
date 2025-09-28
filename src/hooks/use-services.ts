import { useState, useEffect } from "react"
import { useToast } from "@/hooks/use-toast"

interface Service {
  id: number
  title: string
  description: string
  price: string
  features: string[]
  icon: string
  popular?: boolean
}

interface UseServicesReturn {
  services: Service[]
  isLoading: boolean
  error: string | null
  addService: (service: Omit<Service, 'id'>) => Promise<void>
  updateService: (id: number, service: Partial<Service>) => Promise<void>
  deleteService: (id: number) => Promise<void>
  refreshServices: () => Promise<void>
}

export function useServices(): UseServicesReturn {
  const [services, setServices] = useState<Service[]>([])
  const [isLoading, setIsLoading] = useState(false)
  const [error, setError] = useState<string | null>(null)
  const { toast } = useToast()

  // Fetch services from backend
  const fetchServices = async () => {
    try {
      setIsLoading(true)
      setError(null)
      
      // In production, this would be an actual API call
      // const response = await fetch('/backend/api/services')
      // const data = await response.json()
      
      // For now, simulate API response
      await new Promise(resolve => setTimeout(resolve, 500))
      
      const mockServices: Service[] = [
        {
          id: 1,
          title: "Logo Design",
          description: "Professional logos that make your brand unforgettable",
          price: "From $149",
          features: ["3 Concepts", "Unlimited Revisions", "All File Formats", "Copyright Transfer"],
          icon: "🎨",
          popular: false
        },
        {
          id: 2,
          title: "YouTube Thumbnails",
          description: "Eye-catching thumbnails that boost your click-through rates",
          price: "From $49",
          features: ["High CTR Design", "A/B Test Ready", "Mobile Optimized", "24h Delivery"],
          icon: "📺",
          popular: true
        },
        {
          id: 3,
          title: "Video Editing",
          description: "Professional video editing that keeps viewers engaged",
          price: "From $299",
          features: ["Color Grading", "Motion Graphics", "Sound Design", "Fast Turnaround"],
          icon: "🎬",
          popular: false
        }
      ]
      
      setServices(mockServices)
    } catch (err) {
      setError('Failed to fetch services')
      toast({
        title: "Error",
        description: "Failed to load services. Please try again.",
        variant: "destructive"
      })
    } finally {
      setIsLoading(false)
    }
  }

  // Add new service
  const addService = async (serviceData: Omit<Service, 'id'>) => {
    try {
      setIsLoading(true)
      
      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 1000))
      
      const newService: Service = {
        ...serviceData,
        id: Date.now()
      }
      
      setServices(prev => [...prev, newService])
      
      toast({
        title: "Service Added",
        description: `${serviceData.title} has been added successfully.`
      })
    } catch (err) {
      setError('Failed to add service')
      throw err
    } finally {
      setIsLoading(false)
    }
  }

  // Update existing service
  const updateService = async (id: number, serviceData: Partial<Service>) => {
    try {
      setIsLoading(true)
      
      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 1000))
      
      setServices(prev => prev.map(service => 
        service.id === id ? { ...service, ...serviceData } : service
      ))
      
      toast({
        title: "Service Updated",
        description: "Service has been updated successfully."
      })
    } catch (err) {
      setError('Failed to update service')
      throw err
    } finally {
      setIsLoading(false)
    }
  }

  // Delete service
  const deleteService = async (id: number) => {
    try {
      setIsLoading(true)
      
      // Simulate API call
      await new Promise(resolve => setTimeout(resolve, 500))
      
      setServices(prev => prev.filter(service => service.id !== id))
      
      toast({
        title: "Service Deleted",
        description: "Service has been removed successfully."
      })
    } catch (err) {
      setError('Failed to delete service')
      throw err
    } finally {
      setIsLoading(false)
    }
  }

  // Refresh services
  const refreshServices = async () => {
    await fetchServices()
  }

  // Load services on mount
  useEffect(() => {
    fetchServices()
  }, [])

  return {
    services,
    isLoading,
    error,
    addService,
    updateService,
    deleteService,
    refreshServices
  }
}