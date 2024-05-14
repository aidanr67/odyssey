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
Take note of the outputs and use the values in the applications .env file as follows. Note the secret can be retrieved from the state file locally or the Auth0 console.
```
AUTH0_DOMAIN=dev-snevqo0tpiw30jyj.us.auth0.com
AUTH0_CLIENT_ID=jky6jdkEktEWkFCH1mqsiwN0vkH3x86G
AUTH0_CLIENT_SECRET=somethingSuperSecret
# This can be generated using `openssl rand -hex 32` from your shell.
AUTH0_COOKIE_SECRET=0706e7013b80a79a787a61d24defdd3c6e1aa5aa505a2378fd6fdba31cedc47f
AUTH0_BASE_URL=http://localhost
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
