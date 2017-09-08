#!usr/bin/python
from flask import Flask, request, render_template, jsonify
import requests
from requests.auth import HTTPBasicAuth
import json,datetime
from flask_cors import CORS, cross_origin
import pymysql.cursors
from flask.json import JSONEncoder

# from flask_bootstrap import Bootstrap

class CustomJSONEncoder(JSONEncoder):

    def default(self, obj):
        try:
            if isinstance(obj, datetime):
                if obj.utcoffset() is not None:
                    obj = obj - obj.utcoffset()
                millis = int(
                    calendar.timegm(obj.timetuple()) * 1000 +
                    obj.microsecond / 1000
                )
                return millis
            iterable = iter(obj)
        except TypeError:
            pass
        else:
            return list(iterable)
        return JSONEncoder.default(self, obj)

app = Flask(__name__)
app.json_encoder = CustomJSONEncoder

conn = pymysql.connect(host="localhost",
	                          user =  "root",
	                          password = "r00t",
				                    db = "doctor",
				                    charset='utf8mb4',
		                        cursorclass=pymysql.cursors.DictCursor)
CORS(app)


@app.route('/')
def index():
    return render_template('index.html')

@app.route('/patients', methods=['GET'])
def patient():
	cur = conn.cursor()
	cur.execute("SELECT `id`, `name`, `phone`, `time_slot`, `a_date` FROM `appointment`")
	data =  cur.fetchall()
	print data
	return jsonify({"data":data})

@app.route('/add_pateint', methods=['POST'])
def add_pateint():
	try:
		json = request.get_json()
		print json
		name = json['name']
		print name
		phone = json['phone']
		time_slot = json['time_slot']
		a_date = json['a_date']
		print name, phone, time_slot,a_date
		cur = conn.cursor()
		cur.execute("INSERT INTO `appointment` (`name`, `phone`, `time_slot`, `a_date`) VALUES (%s, %s, %s, %s) ", (name, phone, time_slot, a_date))
		conn.commit()
		return jsonify({'success':True})

	except Exception as e:
		print e
		return jsonify({'success':str(e)})
	
if __name__ == "__main__":
    app.run(host='0.0.0.0', debug=True)

