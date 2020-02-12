Introduction:

This is a short description of the commands executed while deploying the test application in kubernetes with GCP. 

There is a separate detailed documentation of the entire process with step by step explanation to be shared in email.

Step 1: Setup Cluster in GKE

Goto terraform folder and use the provider definition(provider.tf) and cluster code(gke-cluster.tf) for cluster creation.

Initialize terraform and execute terraform code to build cluster:

      #terraform init 
      #terraform plan -out myplan
      #terraform apply "myplan"

Step 2: Implementation of test Architecture:

Navigate to kube-files folder for all kubernetes yml files.

Create Stateful App(DB): 

Create Persistent volume: ‘Persistent volume claim’ and ‘storage class’ definition for MySQL data volume are mysql-pv.yml and Storageclass.yml respectively

Navigate to docker-files folder and run below commands to build image for mysql:

       #docker build -t mysql-test .
       #docker tag <image ID> username/mysql-test:latest
       #docker push username/mysql-test:latest
   
Deploy the code to create persistent volume for mysql:

       # kubectl apply -f mysql-pv.yml
       
Deploy MySQL Service:
       
       #kubectl apply -f mysql-deployment.yml


PHP-Apache Deployment:

Create Docker Image for php-apache:

        --Run From docker-files--
        #docker build -t php-apache .
        #docker tag <image ID> username/php-apache:latest
        #docker push username/php-apache:latest

Deploy php-apache application:

        #kubectl apply -f app-api-apache.yml

Autoscaling for Application:

        # kubectl apply -f autoscale.yml

Nginx sidecar deployment:

Create docker image for nginx reverse proxy:

        #docker build -t nginx-rinil .
        #docker tag <image ID> username/nginx-rinil:latest
        #docker push username/nginx-rinil:latest

Deploy nginx sidecar:

        #kubectl apply -f app-sidecar-nginx.yml

Ingress controller/LB Deployment

        Initialize helm:
        # kubectl create serviceaccount --namespace kube-system tiller
        # kubectl create clusterrolebinding tiller-cluster-rule --clusterrole=cluster-admin --serviceaccount=kube-system:tiller
        # helm init --service-account tiller

 install nginx ingress controller:
 
        #helm install --name nginx-ingress stable/nginx-ingress --set rbac.create=true --set controller.publishService.enabled=true
      
Deploy Ingress resource:

      # kubectl apply -f ingress-resource.yaml
      
Step 3: Access Application from browser:
       Application will be available in Load balancer ip address of ingress controller.

