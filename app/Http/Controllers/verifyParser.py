#!/usr/bin/env python
 
import json
import sys

# sanitize the argument
def main(argv = sys.argv[1:]):
    var = ""
    it = 1
    for i in argv:
        var += i
        if(it != len(argv)):
           var += " "
        it += 1
        pass
    return var

arguments = main()

#args = json.dumps(arguments) # doubtful operation

# default sys.exit output inverted!
if(len(sys.argv[1:]) >= 8):
    sys.exit(arguments)
else:
    sys.exit(0) 