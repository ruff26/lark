FROM node:alpine
RUN mkdir -p /var/www/app
WORKDIR /var/www/app
COPY . /var/www/app

RUN npm install
RUN npm run dev

CMD ["npm", "run", "watch"]