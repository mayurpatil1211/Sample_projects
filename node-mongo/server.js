var express = require("express");
var app = express();
var port = process.env.PORT || 8080;
var router = express.Router();
var mongoose = require('mongoose');
var morgan = require('morgan');
var appRoutes = require('./app/routes/api')(router);
var bodyparser = require('body-parser');
var path	= require('path')

app.use(morgan('dev'));
app.use(bodyparser.json());
app.use(bodyparser.urlencoded({exnded : true}));
app.use(express.static(__dirname + '/public'));
app.use('/api', appRoutes);


mongoose.connect('mongodb://localhost:27017/test', function(err){
	if(err){
		console.log("MongoDB crashed " + err)
	}else{
		console.log("MongoDB Connected to the server")
	}
});

app.get('*', function(req, res){
	res.sendFile(path.join(__dirname + '/public/app/views/index.html'));
})






app.listen(port, function(){
	console.log("this is running server on port " + port);
});

