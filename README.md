PHP-Node.js-Kubernetes-App

This project is a Kubernetes-based web application consisting of a PHP frontend and a Node.js backend. It is containerized using Docker and deployed to a Kubernetes cluster.

Directory Structure

PHP-Node.js-Kubernetes-App/
├── Backend
│   ├── Dockerfile              # Dockerfile for Node.js backend
│   ├── certificate.yaml        # SSL certificate configuration
│   ├── clusterissuer.yaml      # Cluster issuer for cert-manager
│   ├── ingress.yaml            # Ingress configuration
│   ├── node-deployment.yaml    # Kubernetes deployment for Node.js backend
│   ├── package.json            # Node.js dependencies
│   ├── server.js               # Node.js server code
│   └── service.yaml            # Service configuration for backend
└── frontend
    ├── Dockerfile              # Dockerfile for PHP frontend
    ├── default.conf            # Nginx configuration file
    ├── index.php               # PHP entry file
    ├── php-deployment.yaml     # Kubernetes deployment for PHP frontend
    ├── script.js               # Frontend JavaScript file
    ├── service.yaml            # Service configuration for frontend
    └── styles.css              # Frontend styles

Prerequisites

Docker

Kubernetes

kubectl

Helm (for cert-manager if using TLS)

Setup & Deployment

1. Clone the Repository

git clone https://github.com/yourusername/PHP-Node.js-Kubernetes-App.git

cd PHP-Node.js-Kubernetes-App

2. Build and Push Docker Images

Frontend (PHP)

cd frontend

docker build -t your-dockerhub-username/php-frontend .

docker push your-dockerhub-username/php-frontend

Backend (Node.js)

cd ../Backend

docker build -t your-dockerhub-username/node-backend .

docker push your-dockerhub-username/node-backend

3. Deploy to Kubernetes

Apply Backend Configuration

kubectl apply -f Backend/service.yaml

kubectl apply -f Backend/node-deployment.yaml

Apply Frontend Configuration

kubectl apply -f frontend/service.yaml

kubectl apply -f frontend/php-deployment.yaml


Apply Ingress

kubectl apply -f Backend/ingress.yaml

Apply SSL Certificate (Here I issued letsencrypt SSL Certificate)

kubectl apply -f Backend/certificate.yaml

kubectl apply -f Backend/clusterissuer.yaml

4. Verify Deployments

kubectl get pods -A

kubectl get svc -A

kubectl get ingress -A


Access Your Project
After applying everything, access your frontend:


https://myproject.yourdomain.com


It should show "Hello from Node.js Backend!" in the PHP frontend.
