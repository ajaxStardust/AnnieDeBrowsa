import sys

from flask import Flask, __version__
app = Flask(__name__)
application = app

@app.route("/")
def hello():
  return """

    Flask is working on HelioHost.<br><br>
    <a href="/flasktest/python/version/">Python version</a><br>
    <a href="/flasktest/flask/version/">Flask version</a>

  """

@app.route("/python/version/")
def p_version():
  return "Python version %s<br><br><a href='/flasktest/'>back</a>" % sys.version

@app.route("/flask/version/")
def f_version():
  return "Flask version %s<br><br><a href='/flasktest/'>back</a>" % __version__

if __name__ == "__main__":
  app.run()