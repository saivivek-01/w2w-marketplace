# ♻️ W2W Marketplace (Waste-to-Wealth Platform)

W2W Marketplace is a PHP-based web platform that connects **waste generators** (individuals or industries) with **waste buyers**, enabling an efficient, circular economy model.

This project was not only built with a scalable web architecture but was also **containerized, infrastructure-automated, and deployed** using modern cloud-native practices — showcasing hands-on expertise in **DevOps, Infrastructure as Code (IaC), Docker, and Cloud Deployment**.

---

## 🌐 Live Application

**URL**: [https://w2w.begetter.me](https://w2w.begetter.me)  
**Status**: ✅ Online & secured with HTTPS  
**Hosted on**: DigitalOcean Droplet (Ubuntu)

---

## 📌 Core Features

- 🔐 User and Admin authentication
- 🗑️ List waste products with images
- 🛒 Browse available waste listings
- 📥 Buy/sell waste with contact forms
- 📊 Admin dashboard for management
- ☁️ Image upload, secure storage
- 📩 Contact form with backend mail handler

---

## 🧠 Role-Based Highlights

### 👷‍♂️ Cloud Engineer
- 🐳 Dockerized entire application (PHP + MySQL + Nginx)
- 🔐 Set up file system permissions and upload capabilities
- 🧪 End-to-end testing of containers and database health

### 🧠 Cloud Architect
- 📦 Defined complete infrastructure using **Terraform**
- 🔧 Provisioned **DigitalOcean Droplet**, SSH keys, firewall rules, and DNS records via IaC
- 🛠️ Configured **NGINX as reverse proxy** for Docker containers
- 🧱 Designed network layout (custom Docker bridge, volume persistence)

### 🧠 Solutions Architect
- 🧩 Designed a modular, scalable deployment architecture
- 🧵 Ensured separation of concerns between services (web, db, reverse proxy)
- 📜 Wrote schema migration and data bootstrapping SQL for automated DB setup
- 🔄 Implemented environment variables for flexible deployment

### 🧠 AI Cloud Engineer
- 🧠 Integrated AI-generated waste image uploads (e.g., using Gemini-generated content)
- 🎯 Focus on building smart eco-platforms with potential for AI-based waste categorization (future scope)
- 📈 Potential to connect with ML-based analytics or recommendation systems in next phases

---

## ⚙️ Tech Stack

| Layer          | Tech Used                     |
|----------------|-------------------------------|
| **Frontend**   | HTML5, CSS3, Vanilla PHP       |
| **Backend**    | PHP, MySQL, Docker             |
| **Infra**      | Docker, Docker Compose, NGINX  |
| **IaC**        | Terraform                      |
| **Cloud**      | DigitalOcean                   |
| **Domain**     | Namecheap (via Begetter.me)    |
| **SSL**        | Let's Encrypt + Certbot        |
| **Auth**       | Session-based login + hashing  |

---

## 📦 Local Development

```bash
git clone https://github.com/saivivek-01/w2w-marketplace.git
cd w2w-marketplace

# Build and start the app
docker-compose up --build

# Access app at: http://localhost:8000

🛡️ Security & Best Practices
	•	🔐 UFW Firewall (ports 22, 80, 443)
	•	🔑 SSH key-based access only
	•	🚫 MySQL access restricted to container
	•	🔒 HTTPS enabled with auto-renewing Let’s Encrypt SSL
	•	📂 File permission management for uploads

⸻

🧠 Future Enhancements
	•	🧠 Add AI-powered waste type classification
	•	📦 Integrate object storage for images (e.g., AWS S3 / DO Spaces)
	•	📊 Add dashboards using Chart.js or similar
	•	🤖 Admin notification system (email or Telegram bot)
	•	🔄 CI/CD via GitHub Actions

⸻

🙋‍♂️ Author

Sai Vivek Mallavalli
👨‍🎓 B.Tech 2026 | Cloud & AI Enthusiast
🌐 Portfolio(https://begetter.me) | 🧠 LinkedIn(https://www.linkedin.com/in/mallavallisaivivek)
📦 All Repos(https://github.com/saivivek-01)
