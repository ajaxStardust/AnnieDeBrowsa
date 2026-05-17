import os, sys

# edit your path below
sys.path.append("/home/admin/web/transformative.click/public_html/flasktest");

sys.path.insert(0, os.path.dirname(__file__))
from myapp import app as application

# set this to something harder to guess
application.secret_key = 'secretpee'