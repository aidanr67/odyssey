terraform {
  required_providers {
    auth0 = {
      source  = "auth0/auth0"
      version = ">= 1.2.0"
    }
  }
}

provider "auth0" {}

############
### Auth0 Application
############
resource "auth0_client" "odyssey_client" {
    name            = var.app_name
    description     = ""
    app_type        = "regular_web"
    callbacks       = ["http://${var.local_app_url}/callback"]
    oidc_conformant = true

    jwt_configuration {
        alg = "RS256"
    }
}

resource "auth0_client_credentials" "odyssey" {
    client_id = auth0_client.odyssey_client.id

    authentication_method = "client_secret_post"
}

###############
# Auth0 API
###############
resource "auth0_resource_server" "odyssey_api" {
    name        = "${var.app_name} API"
    identifier  = "http://api.${var.local_app_url}"
    signing_alg = "RS256"

    allow_offline_access                            = true
    token_lifetime                                  = 8600
    skip_consent_for_verifiable_first_party_clients = true
}
