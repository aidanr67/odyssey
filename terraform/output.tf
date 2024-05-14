output "auth0_client_id" {
    value       = module.auth0.auth0_client_id
    description = "The Auth0 app client ID"
}

output "auth0_client_secret" {
    value       = module.auth0.auth0_client_secret
    description = "The Auth0 app client secret"
    sensitive   = true
}
