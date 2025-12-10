<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
  <meta name="theme-color" content="#000020">
  <title>Christian Rex Gaudiano | Portfolio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Matrix Background -->
  <canvas id="matrix"></canvas>

  <!-- Header -->
  <header>
    <h1>My Portfolio</h1>
    <nav>
      <a href="#" onclick="showSection('about'); return false;">About</a>
      <a href="#" onclick="showSection('projects'); return false;">My Photos</a>
      <a href="#" onclick="showSection('contact'); return false;">Contact</a>
    </nav>
  </header>

  <!-- Hero -->
  <div class="hero">
    <div class="avatar-container">
      <img src="https://scontent.fceb1-2.fna.fbcdn.net/v/t1.6435-1/126553611_113196280610351_3525823301063013293_n.jpg?stp=c0.0.612.612a_dst-jpg_s200x200_tt6&_nc_cat=100&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeEKOCGRlF715woE6h5io4j_SeaslbGSZ-FJ5qyVsZJn4XyPhKIdP0yGEECaFOoWPtzr5gj-fe17_9w55BX2SrFG&_nc_ohc=x6t25zu2wpQQ7kNvwEYF52E&_nc_oc=Adm7b3zAQhnvi3zJ9d3f-Rq5jbzXJL7U-3-D_Bt8ozSoTU4OoHRZOAI3pwu_Amcjc98&_nc_zt=24&_nc_ht=scontent.fceb1-2.fna&_nc_gid=2jrXQn7wxMeDhyWsxm5qZw&oh=00_AfnHjksbjAZC_iRffRu2b0x2K-JtgFMcR2eMQm1N8zUoYQ&oe=695E8C53" 
           alt="Christian Rex Gaudiano" 
           onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
      <div class="avatar-fallback" style="display: none;">J</div>
    </div>
    <h2 class="typing" id="typing"></h2>
  </div>

  <!-- Sections -->
  <section id="about" class="active">
    <h2>About Me</h2>
    <p>I'm a BSIS (Bachelor of Science in Information Systems) student, passionate about technology and learning. I'm focused on living life to the fullest while pursuing my studies and exploring the world of information systems.</p>
  </section>



  <section id="projects">
    <h2>My Photos</h2>
    <div class="photos-grid">
      <div class="photo-card">
        <div class="photo-container">
          <img src="images/gaudiano1.jpg" alt="Photo 1" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22300%22%3E%3Crect fill=%22%23003366%22 width=%22400%22 height=%22300%22/%3E%3Ctext fill=%22%23ffffff%22 font-family=%22Arial%22 font-size=%2220%22 x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22%3EPhoto 1%3C/text%3E%3C/svg%3E';">
        </div>
        <div class="photo-overlay">
          <p>Photo 1</p>
        </div>
      </div>
      <div class="photo-card">
        <div class="photo-container">
          <img src="images/gaudiano2.jpg" alt="Photo 2" onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22300%22%3E%3Crect fill=%22%23003366%22 width=%22400%22 height=%22300%22/%3E%3Ctext fill=%22%23ffffff%22 font-family=%22Arial%22 font-size=%2220%22 x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22%3EPhoto 2%3C/text%3E%3C/svg%3E';">
        </div>
        <div class="photo-overlay">
          <p>Photo 2</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <h2>Contact</h2>
    <p>Email: <a href="mailto:christgaudiano143@gmail.com">christgaudiano143@gmail.com</a></p>
    <p>Facebook: <a href="https://www.facebook.com/christianrex.gaudiano" target="_blank">Christian Rex Gaudiano</a></p>
    <p>Phone: 09558000568</p>
  </section>

  <footer>
    <p>&copy; <span id="currentYear">2024</span> Christian Rex Gaudiano | All Rights Reserved.</p>
  </footer>

  <!-- Typing + Matrix Scripts -->
  <script>
    // Update year dynamically
    document.getElementById('currentYear').textContent = new Date().getFullYear();

    // Typing Effect
    const roles = [
      "Hi! I'm Christian Rex Gaudiano",
      "I'm a BSIS Student",
      "Living life one day at a time"
    ];
    let currentRole = 0;
    let charIndex = 0;
    const typingElement = document.getElementById("typing");

    function typeEffect() {
      if (charIndex < roles[currentRole].length) {
        typingElement.innerHTML = roles[currentRole].substring(0, charIndex + 1);
        charIndex++;
        setTimeout(typeEffect, 100);
      } else {
        setTimeout(eraseEffect, 2000);
      }
    }

    function eraseEffect() {
      if (charIndex > 0) {
        typingElement.innerHTML = roles[currentRole].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(eraseEffect, 50);
      } else {
        currentRole = (currentRole + 1) % roles.length;
        setTimeout(typeEffect, 500);
      }
    }

    document.addEventListener("DOMContentLoaded", () => {
      setTimeout(typeEffect, 1000);
    });

    // Section Toggle
    function showSection(sectionId) {
      document.querySelectorAll("section").forEach(sec => {
        sec.classList.remove("active");
      });
      const targetSection = document.getElementById(sectionId);
      if (targetSection) {
        targetSection.classList.add("active");
        // Smooth scroll to section
        targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }

    // 3D Black & Blue Background Effect
    const canvas = document.getElementById("matrix");
    const ctx = canvas.getContext("2d");

    // Hexagonal network data
    let hexagons = [];
    let nodes = [];
    let connections = [];

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }

    function initHexagons() {
      hexagons = [];
      nodes = [];
      connections = [];
      
      // Optimize for mobile devices
      const isMobile = window.innerWidth <= 768;
      const hexSize = isMobile ? 35 : 40;
      const cols = Math.ceil(canvas.width / (hexSize * 1.5)) + (isMobile ? 1 : 2);
      const rows = Math.ceil(canvas.height / (hexSize * Math.sqrt(3))) + (isMobile ? 1 : 2);
      
      for (let row = 0; row < rows; row++) {
        for (let col = 0; col < cols; col++) {
          const x = col * hexSize * 1.5 + (row % 2) * hexSize * 0.75;
          const y = row * hexSize * Math.sqrt(3);
          
          if (x > -hexSize && x < canvas.width + hexSize && 
              y > -hexSize && y < canvas.height + hexSize) {
            hexagons.push({
              x: x,
              y: y,
              size: hexSize + Math.random() * 20,
              opacity: 0.3 + Math.random() * 0.4,
              filled: Math.random() > 0.6,
              z: Math.random()
            });
            
            // Create nodes at hexagon centers (fewer on mobile)
            const nodeChance = isMobile ? 0.8 : 0.7;
            if (Math.random() > nodeChance) {
              nodes.push({
                x: x,
                y: y,
                size: 3 + Math.random() * 2,
                opacity: 0.8 + Math.random() * 0.2
              });
            }
          }
        }
      }
      
      // Create connections between nearby nodes (fewer on mobile)
      const connectionDist = isMobile ? 120 : 150;
      const connectionChance = isMobile ? 0.75 : 0.7;
      for (let i = 0; i < nodes.length; i++) {
        for (let j = i + 1; j < nodes.length; j++) {
          const dx = nodes[i].x - nodes[j].x;
          const dy = nodes[i].y - nodes[j].y;
          const dist = Math.sqrt(dx * dx + dy * dy);
          
          if (dist < connectionDist && Math.random() > connectionChance) {
            connections.push({
              from: nodes[i],
              to: nodes[j],
              opacity: 0.3 + Math.random() * 0.3
            });
          }
        }
      }
    }

    function drawHexagon(x, y, size, filled, opacity) {
      ctx.beginPath();
      for (let i = 0; i < 6; i++) {
        const angle = (Math.PI / 3) * i;
        const hx = x + size * Math.cos(angle);
        const hy = y + size * Math.sin(angle);
        if (i === 0) {
          ctx.moveTo(hx, hy);
        } else {
          ctx.lineTo(hx, hy);
        }
      }
      ctx.closePath();
      
      if (filled) {
        ctx.fillStyle = `rgba(0, 30, 80, ${opacity * 0.5})`;
        ctx.fill();
      }
      
      ctx.strokeStyle = `rgba(0, 200, 255, ${opacity})`;
      ctx.lineWidth = 1.5;
      ctx.stroke();
    }

    function draw() {
      // Clear with fade effect
      ctx.fillStyle = "rgba(0, 0, 0, 0.15)";
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      // Dark blue gradient background
      const gradient = ctx.createRadialGradient(
        canvas.width / 2, canvas.height / 2, 0,
        canvas.width / 2, canvas.height / 2, Math.max(canvas.width, canvas.height)
      );
      gradient.addColorStop(0, "rgba(0, 10, 30, 0.4)");
      gradient.addColorStop(0.5, "rgba(0, 5, 20, 0.3)");
      gradient.addColorStop(1, "rgba(0, 0, 0, 0.2)");
      ctx.fillStyle = gradient;
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      // Animate hexagons
      const time = Date.now() * 0.0005;
      
      // Draw filled hexagons first (background layer)
      hexagons.forEach((hex, i) => {
        if (hex.filled) {
          const offsetX = Math.sin(time + i * 0.1) * 5;
          const offsetY = Math.cos(time * 0.8 + i * 0.1) * 5;
          drawHexagon(
            hex.x + offsetX, 
            hex.y + offsetY, 
            hex.size, 
            true, 
            hex.opacity * (0.7 + Math.sin(time + i) * 0.3)
          );
        }
      });

      // Draw connections (lines between nodes)
      ctx.lineWidth = 1;
      connections.forEach((conn, i) => {
        const pulse = 0.7 + Math.sin(time * 2 + i) * 0.3;
        ctx.strokeStyle = `rgba(0, 200, 255, ${conn.opacity * pulse})`;
        ctx.shadowBlur = 10;
        ctx.shadowColor = "rgba(0, 200, 255, 0.5)";
        ctx.beginPath();
        ctx.moveTo(conn.from.x, conn.from.y);
        ctx.lineTo(conn.to.x, conn.to.y);
        ctx.stroke();
        ctx.shadowBlur = 0;
      });

      // Draw outlined hexagons (foreground layer)
      hexagons.forEach((hex, i) => {
        if (!hex.filled) {
          const offsetX = Math.sin(time * 0.7 + i * 0.1) * 8;
          const offsetY = Math.cos(time * 0.9 + i * 0.1) * 8;
          drawHexagon(
            hex.x + offsetX, 
            hex.y + offsetY, 
            hex.size, 
            false, 
            hex.opacity * (0.8 + Math.sin(time * 1.5 + i) * 0.2)
          );
        }
      });

      // Draw nodes (dots)
      nodes.forEach((node, i) => {
        const pulse = 0.8 + Math.sin(time * 3 + i) * 0.2;
        const glowGradient = ctx.createRadialGradient(
          node.x, node.y, 0,
          node.x, node.y, node.size * 3
        );
        glowGradient.addColorStop(0, `rgba(0, 200, 255, ${node.opacity * pulse})`);
        glowGradient.addColorStop(0.5, `rgba(0, 150, 255, ${node.opacity * pulse * 0.5})`);
        glowGradient.addColorStop(1, "rgba(0, 0, 0, 0)");
        
        ctx.fillStyle = glowGradient;
        ctx.beginPath();
        ctx.arc(node.x, node.y, node.size * 3, 0, Math.PI * 2);
        ctx.fill();
        
        ctx.fillStyle = `rgba(0, 250, 255, ${node.opacity * pulse})`;
        ctx.beginPath();
        ctx.arc(node.x, node.y, node.size, 0, Math.PI * 2);
        ctx.fill();
      });
    }

    // Initialize canvas
    resizeCanvas();
    initHexagons();
    
    function animate() {
      draw();
      requestAnimationFrame(animate);
    }
    animate();
    
    window.addEventListener("resize", () => {
      resizeCanvas();
      initHexagons();
    });
  </script>

</body>
</html>

