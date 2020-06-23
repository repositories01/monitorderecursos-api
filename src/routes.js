const { Router } = require('express');
const IndexController = require('./app/controllers/IndexController')

const routes = new Router();



routes.get('/', IndexController.index);


module.exports = routes;