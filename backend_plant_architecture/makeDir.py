import pathlib
import sys

def main():
    #print ('argument list', sys.argv)
    #name = sys.argv[1]
    #print ("Hello {}. How are you?".format(name))
    sessionID = sys.argv[1]
    
    STATISTICS_DIR = '%s/statistics' % sessionID
    RECONSTRUCTIONS_DIR = '%s/arbor-reconstructions' % sessionID
    PARETO_FRONTS_DIR = '%s/pareto-fronts' % sessionID
    NULL_MODELS_DIR = '%s/null-models' % sessionID
    FRONT_DRAWINGS_DIR = '%s/pareto-front-drawings' % sessionID

    pathlib.Path(RECONSTRUCTIONS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(PARETO_FRONTS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(FRONT_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(STATISTICS_DIR).mkdir(parents=True, exist_ok=True) 
    pathlib.Path(NULL_MODELS_DIR).mkdir(parents=True, exist_ok=True) 



"""
#pathlib.Path(ORIGINAL_ROOT_NODES_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(CLEANED_ROOT_NODES_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(RECONSTRUCTIONS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(METADATA_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(PARETO_FRONTS_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(STATISTICS_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(NULL_MODELS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(NULL_MODELS_PLOTS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(LOCATION_ANALYSIS_PLOTS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(ARBOR_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(TOY_NETWORK_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
pathlib.Path(FRONT_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
#pathlib.Path(SCORING_DATA_DIR).mkdir(parents=True, exist_ok=True) 
"""

if __name__ == '__main__':
    main()