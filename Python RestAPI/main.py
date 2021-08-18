from flask import Flask, request
from flask_restful import Api, Resource
from flask_cors import CORS

app = Flask(__name__)
CORS(app)
api = Api(app)

CurrencyDict = {
    "EUR": 1,
    "USD": 1.17,
    "GBP": 0.85,
    "CHF": 1.07,
    "JPY": 128.67,
    "CNY": 7.60
}


class HelloWorld(Resource):
    def get(self):
        return {"hello": "world"}


api.add_resource(HelloWorld, "/hello")


class HelloWorld2(Resource):
    def get(self, num):
        return {"hello": f"{num} again"}


api.add_resource(HelloWorld2, "/hello/<int:num>")


class ConvertCurrency(Resource):
    def get(self, amount, cur):
        multiplier = CurrencyDict.get(cur);
        return {"converted": amount * multiplier, "currency": cur}


api.add_resource(ConvertCurrency, "/convert/<int:amount>/<string:cur>")

if __name__ == '__main__':
    app.run(debug=True)
