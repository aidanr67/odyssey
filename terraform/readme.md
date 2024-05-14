# Automating Auth0 auth server creation

## Instructions
* Copy terraform.tfvars.example to terraforms.tfvars
* Update the values.
* Copy the .env.example to .env
* Generate Auth0 credentials by following their [quickstart guide](https://registry.terraform.io/providers/auth0/auth0/latest/docs/guides/quickstart)
* Fill in Auth0 credentials and other details in the .env file
* Run the following commands:
```
make build
make init
make plan
make apply
```
Take note of the outputs and use the values in the applications .env file as follows
```
OKTA_CLIENT_ID=0oa123456
OKTA_CLIENT_SECRET=ThisIsSomeSecretStr1ng
OKTA_BASE_URL=https://dev-123456.auth0preview.com
OKTA_REDIRECT_URI=https://localhost/auth/callback
OKTA_AUTH_SERVER=aus123456
```

Any other terraform commands can be run from inside the container
```
make shell
terraform <command>
```

After making changes to files:
1. terraform fmt
    * formats all your terraform files nicely
2. terraform validate
    * validates your terraform files
