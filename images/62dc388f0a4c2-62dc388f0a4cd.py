import serial
from binascii import hexlify
from sys import argv

_PORT = argv[1]
_BAUDRATE = int(argv[2])
_TIMEOUT = float(argv[3])
_LIMIT = int(argv[4])

# is open port
def openPort():
    
    try:
       global ser
       ser = serial.Serial(
       port=_PORT,
       baudrate=_BAUDRATE,
       timeout=_TIMEOUT,
       parity=serial.PARITY_NONE,
       stopbits=serial.STOPBITS_ONE,
       bytesize=serial.EIGHTBITS
    )
       return True
    except:
       return False


# connection

if openPort():

    if ser.isOpen():

        for i in range(5,len(argv)):
            data = bytes.fromhex(argv[i])
            
            ser.write(data)
            ser.flush()
            temp = ser.read(_LIMIT)

            # res=temp
            # res=temp.decode("windows-1252")
            res=hexlify(temp)

            print(res)

        
        ser.close()
    else:
        print("ERROR:401")

else:
    print("ERROR:500")



"""
 py adapter1.py COM6 19200 8 1024 1b11010008003231 1b11020008003232

"""