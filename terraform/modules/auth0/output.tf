output "auth0_client_id" {
    value       = auth0_client.odyssey_client.client_id
    description = "The Auth0 app client ID"
}

output "auth0_client_secret" {
    value       = auth0_client_credentials.odyssey.client_secret
    description = "The Auth0 app client secret"
    sensitive   = true
}
