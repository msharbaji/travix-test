Step 1: Setup Cluster in GKE

Goto terraform folder and use the provider definition(provider.tf) and cluster code(gke-cluster.tf) for cluster creation.

Initialize terraform and execute terraform code to build cluster:

      #terraform init 
      #terraform plan -out myplan
      #terraform apply "myplan"

Step 2: Implementation of test Architecture:

Navigate to kube-files folder for all kubernetes yml files.

Create Stateful App(DB): We need to create a mysql DB service with persistent volume to meet the requirement here.
       Create Persistent volume: ‘Persistent volume claim’ and ‘storage class’ definition for MySQL data volume are mysql-pv.yml and     Storageclass.yml respectively

Deploy the code to create persistent volume for mysql:

       # kubectl apply -f mysql-pv.yml

Build docker image for mysql:
Navigate to docker-files folder and run below commands:

       #docker build -t mysql-test .
       #docker tag <image ID> username/mysql-test:latest
       #docker push username/mysql-test:latest

       

 

