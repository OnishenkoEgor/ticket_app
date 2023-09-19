FROM node:20-alpine3.17

COPY ./entrypoints/node-entrypoint.sh /var/tmp/node-entrypoint.sh
COPY ./ticket-app/package.json /var/www/ticket-app/package.json
COPY ./ticket-app/package-lock.json /var/www/ticket-app/package-lock.json

WORKDIR /var/www