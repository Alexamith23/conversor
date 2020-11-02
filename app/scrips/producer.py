#!/usr/bin/env python
# import pika
# import sys

# host_name = "localhost"
# message = sys.argv[1]
# # cola = sys.argv[2]
# cola = '1'

# connection = pika.BlockingConnection(
#     pika.ConnectionParameters(host=host_name))
# channel = connection.channel()

# channel.queue_declare(queue=cola, durable=False)

# channel.basic_publish(
#     exchange='',
#     routing_key=cola,
#     body=message,
#     properties=pika.BasicProperties(
#         delivery_mode=2,  # make message persistent
#     ))
# print(" [x] Sent %r" % message)
# connection.close()

import pika

connection = pika.BlockingConnection(
    pika.ConnectionParameters(host='localhost'))
channel = connection.channel()

channel.queue_declare(queue='hello')

channel.basic_publish(exchange='', routing_key='hello', body='Hello World!')
print(" [x] Sent 'Hello World!'")
connection.close()