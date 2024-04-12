# Stage 1: Build front-end assets with Node.js
FROM node:latest as node
WORKDIR /var/www/odyssey
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

CMD ["npm", "run", "dev"]
