terraform {
  required_version = "~> 1.8"
}

module "auth0" {
  source = "./modules/auth0"

  local_app_url = var.local_app_url
  app_name      = var.app_name
}
