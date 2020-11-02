#!/usr/bin/env python
# import pika
# import time

# queue_name = "1"

# connection = pika.BlockingConnection(
#     pika.ConnectionParameters('localhost'))
# channel = connection.channel()

# channel.queue_declare(queue_name, durable=False)
# print(' [*] Waiting for messages. To exit press CTRL+C')

# def callback(ch, method, properties, body):
#     print(" [x] Received %r")
#     # CLI run: /Http/controllers/CLI/VideoDonwloaderCLI.sh body.decode()
#     # time.sleep(body.count(b'.')) # Remove
#     print(" [x] Done: ")
#     ch.basic_ack(delivery_tag=method.delivery_tag)

# channel.basic_qos(prefetch_count=1)
# channel.basic_consume(queue_name, on_message_callback=callback)

# channel.start_consuming()

import pika, sys, os

def main():
    connection = pika.BlockingConnection(pika.ConnectionParameters(host='localhost'))
    channel = connection.channel()

    channel.queue_declare(queue='hello')

    def callback(ch, method, properties, body):
        print(" [x] Received %r" % body)

    channel.basic_consume(queue='hello', on_message_callback=callback, auto_ack=True)

    print(' [*] Waiting for messages. To exit press CTRL+C')
    channel.start_consuming()

if __name__ == '__main__':
    try:
        main()
    except KeyboardInterrupt:
        print('Interrupted')
        try:
            sys.exit(0)
        except SystemExit:
            os._exit(0)