from flask import Flask,jsonify,request


app = Flask("app")

def generar_respuesta_json(resultado,operacion):

    data = {
        "Operacion" : operacion,
        "Resultado" : str(resultado)
    }
    return jsonify(data)

@app.route('/')
def hello_world():
    return 'Hola mundo'

@app.route("/triangulo/<string:base>/<string:altura>/")
def triangulo(base, altura):

    area = (int(base)*int(altura))/ 2

    return generar_respuesta_json(area,"calcular_area_triangulo")

#TODO Añadir la funcionalidad de calcular el factorial de un número al API

@app.route("/factorial/<int:numero>/")
def factorial(numero):
    if (numero==0):
        return generar_respuesta_json(1,"calcular_factorial")
    elif (numero>0):
        result = 1
        for i in range(2,numero+1):
            result = result * i
        return generar_respuesta_json(result,"calcular_factorial")
    else:
        raise ValueError('El valor de numero ha de ser >=0.')




if __name__ == "__main__":
    app.run()