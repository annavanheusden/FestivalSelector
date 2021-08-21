from flask import Flask, request
from flask_restful import Api, Resource
from flask_cors import CORS
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
CORS(app)
api = Api(app)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///database.db'
db = SQLAlchemy(app)


# class CurrencyValue(db.Model):
#     id = db.Column(db.Integer, primary_key=True)
#     currency = db.Column(db.String(3), nullable=False)
#     valueToEuro = db.Column(db.Float, nullable=False)
#
#     def __repr__(self):
#         return f"Currency(code={currency}, valueToEuro={valueToEuro})"


# db.create_all()

CurrencyDict = {
    "EUR": 1,
    "USD": 1.17,
    "GBP": 0.85,
    "CHF": 1.07,
    "JPY": 128.67,
    "CNY": 7.60
}
#
# resource_fields = {
#     'id' = fields.Integer,
#     'converted' = fields.,
#     'currency' = fields.String
# }

class HelloWorld(Resource):
    def get(self):
        return {"hello": "world"}


api.add_resource(HelloWorld, "/")


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
