#!/usr/bin/bash
source "/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/tomatoenvy/bin/activate"
python /home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/backend/backend_plant_architecture/makeDir.py
python /home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/backend/backend_plant_architecture/automated_data_pipeline_single_file.py
echo $VIRTUAL_ENV