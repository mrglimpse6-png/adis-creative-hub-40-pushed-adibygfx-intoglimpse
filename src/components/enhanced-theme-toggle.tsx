import { Moon, Sun } from "lucide-react"
import { Button } from "@/components/ui/button"
import { useTheme } from "@/components/theme-provider"
import { cn } from "@/lib/utils"
import { useState } from "react"

/**
 * Enhanced Theme Toggle Component
 * 
 * A playful and engaging theme toggle button with:
 * - Smooth icon morphing animations
 * - Vibrant color schemes for both themes
 * - Satisfying click feedback with ripple effects
 * - Accessible design with proper ARIA labels
 * - Mobile-friendly 44px+ touch target
 * 
 * Usage:
 * <EnhancedThemeToggle />
 */
export function EnhancedThemeToggle() {
  const { theme, setTheme } = useTheme()
  const [isClicked, setIsClicked] = useState(false)

  const toggleTheme = () => {
    // Trigger click animation
    setIsClicked(true)
    setTimeout(() => setIsClicked(false), 600)
    
    // Toggle theme
    setTheme(theme === "light" ? "dark" : "light")
    
    // Optional: Add haptic feedback for mobile devices
    if ('vibrate' in navigator) {
      navigator.vibrate(50)
    }
  }

  return (
    <div className="relative">
      <Button
        onClick={toggleTheme}
        variant="ghost"
        size="sm"
        className={cn(
          // Base styles with playful rounded edges (12px minimum)
          "relative h-12 w-12 rounded-2xl overflow-hidden",
          "transition-all duration-500 ease-out",
          "hover:scale-110 active:scale-95",
          "focus-visible:ring-2 focus-visible:ring-offset-2",
          "theme-toggle-hover",
          
          // Background gradients with vibrant colors
          theme === "light" 
            ? [
                "bg-gradient-to-br from-amber-100 via-orange-50 to-yellow-100",
                "hover:from-amber-200 hover:via-orange-100 hover:to-yellow-200",
                "focus-visible:ring-amber-400"
              ]
            : [
                "bg-gradient-to-br from-slate-800 via-blue-900 to-indigo-900",
                "hover:from-slate-700 hover:via-blue-800 hover:to-indigo-800", 
                "focus-visible:ring-blue-400"
              ],
          
          // Soft drop shadows for depth (2-4px blur)
          theme === "light"
            ? "shadow-[0_3px_12px_rgba(251,191,36,0.25)] hover:shadow-[0_4px_16px_rgba(251,191,36,0.35)]"
            : "shadow-[0_3px_12px_rgba(59,130,246,0.25)] hover:shadow-[0_4px_16px_rgba(59,130,246,0.35)]",
          
          // Subtle borders for definition
          "border-2",
          theme === "light" 
            ? "border-amber-200/60 hover:border-amber-300/80" 
            : "border-blue-700/60 hover:border-blue-600/80"
        )}
        aria-label={`Switch to ${theme === "light" ? "dark" : "light"} theme`}
        aria-pressed={theme === "dark"}
      >
        {/* Main icon container with morphing animation */}
        <div className="relative w-7 h-7 flex items-center justify-center">
          {/* Sun icon for light mode with rays animation */}
          <Sun 
            className={cn(
              "absolute h-7 w-7 transition-all duration-500 ease-out",
              theme === "light" 
                ? "rotate-0 scale-100 opacity-100 text-amber-600 sun-animation" 
                : "rotate-90 scale-0 opacity-0 text-amber-600"
            )}
            style={{
              filter: theme === "light" 
                ? "drop-shadow(0 0 8px rgba(251,191,36,0.6))" 
                : "none"
            }}
          />
          
          {/* Moon icon for dark mode with glow animation */}
          <Moon 
            className={cn(
              "absolute h-7 w-7 transition-all duration-500 ease-out",
              theme === "dark" 
                ? "rotate-0 scale-100 opacity-100 text-blue-300 moon-animation" 
                : "-rotate-90 scale-0 opacity-0 text-blue-300"
            )}
            style={{
              filter: theme === "dark" 
                ? "drop-shadow(0 0 8px rgba(147,197,253,0.6))" 
                : "none"
            }}
          />
          
          {/* Animated background particles */}
          <div 
            className={cn(
              "absolute inset-0 rounded-full transition-all duration-700 ease-out",
              theme === "light"
                ? "bg-gradient-radial from-amber-300/15 via-orange-200/8 to-transparent"
                : "bg-gradient-radial from-blue-400/15 via-indigo-300/8 to-transparent"
            )}
            style={{
              animation: theme === "light" ? "gentle-pulse 3s ease-in-out infinite" : "gentle-pulse 4s ease-in-out infinite"
            }}
          />
        </div>
        
        {/* Click ripple effect */}
        {isClicked && (
          <div 
            className={cn(
              "absolute inset-0 rounded-2xl pointer-events-none",
              "bg-gradient-to-r opacity-0",
              theme === "light"
                ? "from-amber-400/40 to-orange-400/40"
                : "from-blue-400/40 to-indigo-400/40"
            )}
            style={{
              animation: "ripple 0.6s ease-out forwards"
            }}
          />
        )}
        
        {/* Hover glow effect */}
        <div 
          className={cn(
            "absolute inset-0 rounded-2xl opacity-0 transition-opacity duration-300",
            "hover:opacity-100 pointer-events-none",
            theme === "light"
              ? "bg-gradient-to-br from-amber-300/20 to-orange-300/20"
              : "bg-gradient-to-br from-blue-400/20 to-indigo-400/20"
          )}
        />
      </Button>
      
      {/* Floating particles effect */}
      <div className="absolute inset-0 pointer-events-none">
        {[...Array(3)].map((_, i) => (
          <div
            key={i}
            className={cn(
              "absolute w-1 h-1 rounded-full opacity-0",
              theme === "light" ? "bg-amber-400" : "bg-blue-400"
            )}
            style={{
              left: `${20 + i * 20}%`,
              top: `${30 + i * 15}%`,
              animation: `float-particle-${i + 1} ${3 + i}s ease-in-out infinite`,
              animationDelay: `${i * 0.5}s`
            }}
          />
        ))}
      </div>
    </div>
  )
}

/**
 * Alternative Compact Version
 * For use in tight spaces while maintaining playful design
 */
export function CompactThemeToggle() {
  const { theme, setTheme } = useTheme()
  const [isClicked, setIsClicked] = useState(false)

  const toggleTheme = () => {
    setIsClicked(true)
    setTimeout(() => setIsClicked(false), 400)
    setTheme(theme === "light" ? "dark" : "light")
  }

  return (
    <Button
      onClick={toggleTheme}
      variant="ghost"
      size="sm"
      className={cn(
        "h-10 w-10 rounded-xl transition-all duration-300 ease-out",
        "hover:scale-105 active:scale-95",
        
        // Compact color scheme
        theme === "light" 
          ? "bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200/50" 
          : "bg-slate-800 hover:bg-slate-700 text-blue-300 border border-blue-700/50",
        
        // Compact shadows
        "shadow-sm hover:shadow-md"
      )}
      aria-label={`Switch to ${theme === "light" ? "dark" : "light"} theme`}
    >
      <div className="relative">
        <Sun className={cn(
          "h-5 w-5 transition-all duration-300",
          theme === "light" ? "rotate-0 scale-100" : "rotate-180 scale-0"
        )} />
        <Moon className={cn(
          "absolute inset-0 h-5 w-5 transition-all duration-300",
          theme === "dark" ? "rotate-0 scale-100" : "-rotate-180 scale-0"
        )} />
      </div>
      
      {isClicked && (
        <div className="absolute inset-0 rounded-xl bg-current opacity-20 animate-ping" />
      )}
    </Button>
  )
}