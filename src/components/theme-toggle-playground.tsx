import { useState } from "react"
import { Moon, Sun, Palette, Zap } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Card } from "@/components/ui/card"
import { useTheme } from "@/components/theme-provider"
import { cn } from "@/lib/utils"

/**
 * Theme Toggle Playground Component
 * 
 * Demonstrates different variations of the theme toggle button
 * for testing and showcasing the playful design options
 */
export function ThemeTogglePlayground() {
  const { theme, setTheme } = useTheme()
  const [activeDemo, setActiveDemo] = useState(0)

  const toggleTheme = () => {
    setTheme(theme === "light" ? "dark" : "light")
  }

  const demoVariants = [
    {
      name: "Enhanced Playful",
      description: "Full-featured with particles and glow effects",
      component: <EnhancedPlayfulToggle />
    },
    {
      name: "Minimalist Smooth",
      description: "Clean design with smooth transitions",
      component: <MinimalistToggle />
    },
    {
      name: "Bouncy Fun",
      description: "Extra playful with bounce animations",
      component: <BouncyToggle />
    },
    {
      name: "Gradient Magic",
      description: "Dynamic gradients with color transitions",
      component: <GradientToggle />
    }
  ]

  return (
    <div className="max-w-4xl mx-auto p-8">
      <div className="text-center mb-12">
        <h1 className="text-3xl font-bold text-foreground mb-4">
          Theme Toggle <span className="text-gradient-youtube">Playground</span>
        </h1>
        <p className="text-muted-foreground">
          Explore different variations of the playful theme toggle button
        </p>
      </div>

      {/* Demo selector */}
      <div className="flex flex-wrap justify-center gap-2 mb-8">
        {demoVariants.map((variant, index) => (
          <Button
            key={index}
            onClick={() => setActiveDemo(index)}
            variant={activeDemo === index ? "default" : "outline"}
            size="sm"
            className={activeDemo === index ? "bg-gradient-youtube" : ""}
          >
            {variant.name}
          </Button>
        ))}
      </div>

      {/* Active demo display */}
      <Card className="p-8 text-center">
        <h3 className="text-xl font-semibold text-foreground mb-2">
          {demoVariants[activeDemo].name}
        </h3>
        <p className="text-muted-foreground mb-8">
          {demoVariants[activeDemo].description}
        </p>
        
        <div className="flex justify-center mb-8">
          {demoVariants[activeDemo].component}
        </div>
        
        <div className="text-sm text-muted-foreground">
          Current theme: <span className="font-medium text-foreground">{theme}</span>
        </div>
      </Card>

      {/* Implementation guide */}
      <Card className="mt-8 p-6">
        <h3 className="text-lg font-semibold text-foreground mb-4">
          Implementation Guide
        </h3>
        <div className="space-y-4 text-sm text-muted-foreground">
          <div>
            <strong className="text-foreground">Installation:</strong>
            <code className="block bg-muted p-2 rounded mt-1">
              import {`{EnhancedThemeToggle}`} from "@/components/enhanced-theme-toggle"
            </code>
          </div>
          <div>
            <strong className="text-foreground">Usage:</strong>
            <code className="block bg-muted p-2 rounded mt-1">
              {`<EnhancedThemeToggle />`}
            </code>
          </div>
          <div>
            <strong className="text-foreground">Features:</strong>
            <ul className="list-disc list-inside mt-1 space-y-1">
              <li>Smooth 500ms transitions with easing</li>
              <li>Icon morphing with rotation and scaling</li>
              <li>Vibrant gradient backgrounds</li>
              <li>Soft drop shadows (3-4px blur)</li>
              <li>Click ripple effects</li>
              <li>Hover scale animations</li>
              <li>Accessibility compliant</li>
              <li>Mobile-friendly 48px touch target</li>
            </ul>
          </div>
        </div>
      </Card>
    </div>
  )
}

// Demo component variations
function EnhancedPlayfulToggle() {
  const { theme, setTheme } = useTheme()
  const [isClicked, setIsClicked] = useState(false)

  const toggleTheme = () => {
    setIsClicked(true)
    setTimeout(() => setIsClicked(false), 600)
    setTheme(theme === "light" ? "dark" : "light")
  }

  return (
    <div className="relative">
      <Button
        onClick={toggleTheme}
        className={cn(
          "relative h-14 w-14 rounded-2xl overflow-hidden",
          "transition-all duration-500 ease-out",
          "hover:scale-110 active:scale-95",
          
          theme === "light" 
            ? "bg-gradient-to-br from-amber-100 via-orange-50 to-yellow-100 hover:from-amber-200 hover:via-orange-100 hover:to-yellow-200" 
            : "bg-gradient-to-br from-slate-800 via-blue-900 to-indigo-900 hover:from-slate-700 hover:via-blue-800 hover:to-indigo-800",
          
          theme === "light"
            ? "shadow-[0_4px_16px_rgba(251,191,36,0.3)] hover:shadow-[0_6px_24px_rgba(251,191,36,0.4)]"
            : "shadow-[0_4px_16px_rgba(59,130,246,0.3)] hover:shadow-[0_6px_24px_rgba(59,130,246,0.4)]",
          
          "border-2",
          theme === "light" ? "border-amber-200/50" : "border-blue-700/50"
        )}
      >
        <div className="relative w-8 h-8">
          <Sun className={cn(
            "absolute inset-0 h-8 w-8 transition-all duration-500",
            theme === "light" ? "rotate-0 scale-100 opacity-100 text-amber-600" : "rotate-90 scale-0 opacity-0"
          )} />
          <Moon className={cn(
            "absolute inset-0 h-8 w-8 transition-all duration-500",
            theme === "dark" ? "rotate-0 scale-100 opacity-100 text-blue-300" : "-rotate-90 scale-0 opacity-0"
          )} />
        </div>
        
        {isClicked && (
          <div className={cn(
            "absolute inset-0 rounded-2xl",
            theme === "light" ? "bg-amber-400/30" : "bg-blue-400/30"
          )} style={{ animation: "ripple 0.6s ease-out" }} />
        )}
      </Button>
    </div>
  )
}

function MinimalistToggle() {
  const { theme, setTheme } = useTheme()

  return (
    <Button
      onClick={() => setTheme(theme === "light" ? "dark" : "light")}
      className={cn(
        "h-12 w-12 rounded-xl transition-all duration-300",
        "hover:scale-105 active:scale-95",
        theme === "light" 
          ? "bg-amber-50 hover:bg-amber-100 text-amber-700" 
          : "bg-slate-800 hover:bg-slate-700 text-blue-300",
        "shadow-sm hover:shadow-md"
      )}
    >
      <Sun className={cn("h-5 w-5 transition-all duration-300", theme === "light" ? "rotate-0 scale-100" : "rotate-180 scale-0")} />
      <Moon className={cn("absolute h-5 w-5 transition-all duration-300", theme === "dark" ? "rotate-0 scale-100" : "-rotate-180 scale-0")} />
    </Button>
  )
}

function BouncyToggle() {
  const { theme, setTheme } = useTheme()

  return (
    <Button
      onClick={() => setTheme(theme === "light" ? "dark" : "light")}
      className={cn(
        "h-12 w-12 rounded-2xl transition-all duration-300",
        "hover:animate-bounce active:scale-90",
        theme === "light" 
          ? "bg-gradient-to-r from-yellow-200 to-orange-200 text-orange-700" 
          : "bg-gradient-to-r from-indigo-800 to-purple-800 text-indigo-200",
        "shadow-lg hover:shadow-xl"
      )}
    >
      <div className="relative">
        <Sun className={cn("h-6 w-6 transition-all duration-300", theme === "light" ? "rotate-0 scale-100" : "rotate-45 scale-0")} />
        <Moon className={cn("absolute inset-0 h-6 w-6 transition-all duration-300", theme === "dark" ? "rotate-0 scale-100" : "-rotate-45 scale-0")} />
      </div>
    </Button>
  )
}

function GradientToggle() {
  const { theme, setTheme } = useTheme()

  return (
    <Button
      onClick={() => setTheme(theme === "light" ? "dark" : "light")}
      className={cn(
        "h-12 w-12 rounded-2xl transition-all duration-500",
        "hover:scale-110 active:scale-95",
        "bg-gradient-to-br",
        theme === "light" 
          ? "from-yellow-300 via-orange-300 to-red-300 hover:from-yellow-400 hover:via-orange-400 hover:to-red-400" 
          : "from-blue-600 via-purple-600 to-indigo-600 hover:from-blue-500 hover:via-purple-500 hover:to-indigo-500",
        "shadow-lg hover:shadow-2xl"
      )}
    >
      <div className="relative">
        <Sun className={cn(
          "h-6 w-6 transition-all duration-500 text-white",
          theme === "light" ? "rotate-0 scale-100 opacity-100" : "rotate-180 scale-0 opacity-0"
        )} />
        <Moon className={cn(
          "absolute inset-0 h-6 w-6 transition-all duration-500 text-white",
          theme === "dark" ? "rotate-0 scale-100 opacity-100" : "-rotate-180 scale-0 opacity-0"
        )} />
      </div>
    </Button>
  )
}