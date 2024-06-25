import os
from pathlib import Path

from textblob import TextBlob
os.environ['CHAT_GPT_KEY'] = "sk-proj-OZtBfxsryhgjZEUsC3iST3BlbkFJDUrtMhtOCRv620Klz4NF"
import openai
from langchain.chat_models import ChatOpenAI
from langchain.schema import HumanMessage, SystemMessage
from openai import OpenAI
import json
from collections import defaultdict

# with open('ai/fine-data.txt', 'r', encoding='utf-8') as f:
#     text = [line for line in f]
#     text[:10]
#     # print(text)

# def formatear_ejemplo(lista_mensajes, system_message=None):
#     messages = []

#     # Incluir primero el mensaje de sistema
#     if system_message:
#         messages.append({
#             "role": "system",
#             "content": system_message
#         })

#     # Iterar por la lista de mensajes
#     for mensaje in lista_mensajes:
#         # Separar los mensajes por los dos puntos y el espacio
#         partes = mensaje.split(': ', maxsplit=1)

#         #Controlar si alguna línea no cumple el patrón
#         if len(partes) < 2:
#             continue

#         # Identificar el rol y content
#         role = partes[0].strip()
#         content = partes[1].strip()

#         # Formatear el mensaje
#         message = {
#             "role": role,
#             "content": content
#         }

#         #Agregar el mensaje a la lista
#         messages.append(message)

#     # Crear diccionario final
#     dict_final = {
#         "messages": messages
#     }

#     return dict_final

# system_message = 'Eres un asistente del software Ecocomunidad. \
# Tu trabajo es proporcionar los parámetros de evaluación de proyectos de infraestructura sostenible. \
# Si un usuario pregunta por detalles de esos parámetros, los explicas de forma genérica.'

# dataset = []

# ejemplo = []
# for line in text:
#   if line == '-\n':
#     ejemplo_formateado = formatear_ejemplo(lista_mensajes=ejemplo,
#                                             system_message=system_message)

#     dataset.append(ejemplo_formateado)
#     ejemplo = []
#     continue

#   ejemplo.append(line)
# print(dataset[1])


# Validacion de errores y estimacion de precios ===============================

# format_errors = defaultdict(int)

# for ex in dataset:
#     if not isinstance(ex, dict):
#         format_errors["data_type"] += 1
#         continue

#     messages = ex.get("messages", None)
#     if not messages:
#         format_errors["missing_messages_list"] += 1
#         continue

#     for message in messages:
#         if "role" not in message or "content" not in message:
#             format_errors["message_missing_key"] += 1

#         if any(k not in ("role", "content", "name") for k in message):
#             format_errors["message_unrecognized_key"] += 1

#         if message.get("role", None) not in ("system", "user", "assistant"):
#             format_errors["unrecognized_role"] += 1

#         content = message.get("content", None)
#         if not content or not isinstance(content, str):
#             format_errors["missing_content"] += 1

#     if not any(message.get("role", None) == "assistant" for message in messages):
#         format_errors["example_missing_assistant_message"] += 1

# if format_errors:
#     print("Found errors:")
#     for k, v in format_errors.items():
#         print(f"{k}: {v}")
# else:
#     print("No errors found")


# Guardar las lineas en formato JSON ====================================

# def save_to_jsonl(dataset, file_path):
#     with open(file_path, 'w') as file:
#         for ejemplo in dataset:
#             json_line = json.dumps(ejemplo, ensure_ascii=False)
#             file.write(json_line + '\n')


# save_to_jsonl(dataset, 'instrucciones_proyectos_train.jsonl')


# Cargar archivos =========================================================

system_message = 'Eres un asistente del software Ecocomunidad. \
Tu trabajo es proporcionar los parámetros de evaluación de proyectos de infraestructura sostenible. \
Si un usuario pregunta por detalles de esos parámetros, los explicas de forma genérica. \
Los parámetros son los siguientes y debes evaluar según los valores: \
    1. Costo total -> El usuario puede colocar una cifra de mínimo 5 cifras. \
    2. Beneficios netos -> El usuario puede colocar una cifra de mínimo 4 cifras y no puede ser mayor que el costo total. \
    3. Creación de empleos -> El usuario debe colocar sí o no. \
    4. Acceso a servicios -> El usuario debe colocar sí o no. \
    5. Emisión de gases CO2 -> El usuario debe colocar un número mayor a cero. Para la comparación, el nivel de gases debe ser menor a 1000 toneladas de CO2. \
    6. Consumo de recursos -> El usuario debe colocar un número mayor a cero. Para la comparación, el número de recursos debe tener valor: 15000 < valor < 30000 toneladas de materiales. \
    7. Tecnología disponible -> El usuario debe colocar sí o no. \
    8. Plan de gestión de riesgos -> El usuario debe colocar sí o no.'

client = OpenAI(api_key="sk-proj-OZtBfxsryhgjZEUsC3iST3BlbkFJDUrtMhtOCRv620Klz4NF")

# training_file = client.files.create(
#     file=Path("fail_cases.jsonl"),
#     purpose="fine-tune"
# )

# print(f'id: {training_file.id}')

# results = client.fine_tuning.jobs.create(
#     training_file=training_file.id,
#     model="ft:gpt-3.5-turbo-0613:personal::9ZgdU4pa",
#     suffix="ecocommunity",
#     hyperparameters={"n_epochs":4}
# )

# print(results)

# res = client.fine_tuning.jobs.retrieve("ftjob-FQurcSgKZlyyfH90XbxwzwXk")
# print(res)

# from flask import Flask, request, jsonify
# from langchain.chat_models import ChatOpenAI
# from langchain.schema import HumanMessage, SystemMessage

# model_name = "ft:gpt-3.5-turbo-0613:personal:ecocommunity:9ZhNt663"
# chat = ChatOpenAI(model=model_name, temperature=0.07, openai_api_key="sk-proj-OZtBfxsryhgjZEUsC3iST3BlbkFJDUrtMhtOCRv620Klz4NF")

# messages = [
#     SystemMessage(content=system_message),
#     HumanMessage(content="Los valores de mi proyecto son: costo = 134500, beneficios = 21900, crea empleos = no, acceso servicios = sí, emisión gases = 1100, recursos = 17800, maquinaria = sí, riesgos = sí")
# ]

# response = chat(messages)
# print(response.content)

from flask import Flask, request, jsonify
from langchain.chat_models import ChatOpenAI
from langchain.schema import HumanMessage, SystemMessage

app = Flask(__name__)

model_name = "ft:gpt-3.5-turbo-0613:personal:ecocommunity:9ZhNt663"
chat_instance = ChatOpenAI(model=model_name, temperature=0.07, openai_api_key="sk-proj-OZtBfxsryhgjZEUsC3iST3BlbkFJDUrtMhtOCRv620Klz4NF")

@app.route('/python/chat', methods=['POST'])
def chat():
    data = request.json
    sm = system_message
    user_message = data.get('message', '')

    messages = [
    SystemMessage(content=system_message),
    HumanMessage(content=user_message)
    ]

    response = chat_instance(messages)
    response_content = response.dict()['choices'][0]['message']['content']

    # Análisis de sentimientos
    analysis = TextBlob(response_content)
    sentiment_positive = analysis.sentiment.polarity > 0

    return jsonify({
        'response': response.dict(),
        'sentiment_positive': sentiment_positive if 'sentiment_positive' in locals() else False
    })

if __name__ == '__main__':
    app.run(port=5000)

