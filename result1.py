##-*- coding=utf-8 -*-
#from flask import Flask
#from flask import render_template
#from flask import request
#app = Flask(__name__)
#@app.route("/")
#def index(): #โมดูลรับค่าจากไฟล์ index.html โดยการส่งค่าในรูปแบบ POST
#    return render_template('ml_test.html')
#@app.route('/save', methods=['POST'])
#def save(): #โมดูลแสดงข้อมูล
#    x = dict(request.form.items())
#    return "รับค่าสำเร็จ %s"%(x)
#app.run(debug=True)

#-*- coding=utf-8 -*-
from flask import Flask
app = Flask(__name__)
@app.route('/')

def hello_world():  #def  เป็นคำสำคัญสำหรับการสร้างฟังก์ชัน
   return 'Hello World' #ให้แสดงข้อความว่า Hello World ออกทางหน้าฟอร์ม

if __name__ == '__main__':
   app.run()