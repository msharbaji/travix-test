provider "google" {
  credentials = file("./creds/serviceaccount.json")
  project     = "rinil-project"
  region      = "europe-west1"
}
