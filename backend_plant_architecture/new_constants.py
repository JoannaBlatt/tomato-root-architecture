import numpy as np

STATISTICS_DIR = '/statistics'
RECONSTRUCTIONS_DIR = '/arbor-reconstructions'
PARETO_FRONTS_DIR = '/pareto-fronts'
NULL_MODELS_DIR = '/null-models'
FRONT_DRAWINGS_DIR = '/pareto-front-drawings'
BASE_PATH = '/home/dh_an3skk/arjun-chandrasekhar-teaching.com/tomato/'

PARETO_FRONT_DELTA = 0.01
DEFAULT_ALPHAS = np.arange(0, 1 + PARETO_FRONT_DELTA, PARETO_FRONT_DELTA)

#DATA_DIR = 'data'
#ARCHITECTURE_DIR = '%s/architecture-data' % DATA_DIR

#RAW_DATA_DIR = '%s/raw-data' % ARCHITECTURE_DIR
#ORIGINAL_ROOT_NODES_DIR = '%s/root-nodes-original' % RAW_DATA_DIR
#CLEANED_ROOT_NODES_DIR = '%s/root-nodes-cleaned' % RAW_DATA_DIR  #data/architecture-data/raw-data/root-nodes-cleaned

#RECONSTRUCTIONS_DIR = '%s/arbor-reconstructions' % ARCHITECTURE_DIR #data/architecture-data/arbor-reconstructions

#METADATA_DIR = '%s/metadata' % DATA_DIR

#RESULTS_DIR = '%s/results' % DATA_DIR
#PARETO_FRONTS_DIR = '%s/pareto-fronts' % RESULTS_DIR
#STATISTICS_DIR = '%s/statistics' % RESULTS_DIR
#NULL_MODELS_DIR = '%s/null-models' % RESULTS_DIR

#FIGS_DIR = 'figs'
#PLOTS_DIR = '%s/plots' % FIGS_DIR
#NULL_MODELS_PLOTS_DIR = '%s/null-models-analysis' % PLOTS_DIR
#LOCATION_ANALYSIS_PLOTS_DIR = '%s/pareto-front-location-analysis' % PLOTS_DIR 
#DRAWINGS_DIR = '%s/drawings' % FIGS_DIR
#ARBOR_DRAWINGS_DIR = '%s/arbors' % DRAWINGS_DIR
#TOY_NETWORK_DRAWINGS_DIR = '%s/toy-network' % DRAWINGS_DIR
#FRONT_DRAWINGS_DIR = '%s/pareto-front-drawings' % DRAWINGS_DIR

#PARETO_FRONT_DELTA = 0.01
#DEFAULT_ALPHAS = np.arange(0, 1 + PARETO_FRONT_DELTA, PARETO_FRONT_DELTA)

#SCORING_DATA_DIR = '%s/scoring-data' % DATA_DIR

##list of all needed directories for processing a single arbor reconstruction file
#NECESSARY_DIR_LIST = [RECONSTRUCTIONS_DIR, PARETO_FRONTS_DIR, STATISTICS_DIR, NULL_MODELS_DIR, FRONT_DRAWINGS_DIR]

##directory setup
##sessID-dir
##-datadir
##architecture dir


##analyze arbors uses: STATISTICS_DIR, RECONSTRUCTIONS_DIR, PARETO_FRONTS_DIR
##arbor statistics:  Do I even need this file anymore?
##auto_pipeline: RECONSTRUCTIONS_DIR
##null_models: NULL_MODELS_DIR, STATISTICS_DIR, PARETO_FRONTS_DIR

##pareto_functions: FRONT_DRAWINGS_DIR, PARETO_FRONTS_DIR, NULL_MODELS_DIR
##read_arbor_reconstructions: RECONSTRUCTIONS_DIR

##necessary dirs: STATISTICS_DIR, RECONSTRUCTIONS_DIR, PARETO_FRONTS_DIR, NULL_MODELS_DIR, FRONT_DRAWINGS_DIR
##sessionIDdirectory: 


#def main():
#    #print ('argument list', sys.argv)
#    #name = sys.argv[1]
#    #print ("Hello {}. How are you?".format(name))
#    sessionID = sys.argv[1]
#    STATISTICS_DIR = '%s/statistics' % sessionID
#    RECONSTRUCTIONS_DIR = '%s/arbor-reconstructions' % sessionID
#    PARETO_FRONTS_DIR = '%s/pareto-fronts' % sessionID
#    NULL_MODELS_DIR = '%s/null-models' % sessionID
#    FRONT_DRAWINGS_DIR = '%s/pareto-front-drawings' % sessionID

#    pathlib.Path(RECONSTRUCTIONS_DIR).mkdir(parents=True, exist_ok=True) 
#    #pathlib.Path(METADATA_DIR).mkdir(parents=True, exist_ok=True) 
#    pathlib.Path(PARETO_FRONTS_DIR).mkdir(parents=True, exist_ok=True) 
#    pathlib.Path(STATISTICS_DIR).mkdir(parents=True, exist_ok=True) 
#    pathlib.Path(NULL_MODELS_DIR).mkdir(parents=True, exist_ok=True) 
#    #pathlib.Path(NULL_MODELS_PLOTS_DIR).mkdir(parents=True, exist_ok=True) 
#    #pathlib.Path(LOCATION_ANALYSIS_PLOTS_DIR).mkdir(parents=True, exist_ok=True) 
#    #pathlib.Path(ARBOR_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
#    #pathlib.Path(TOY_NETWORK_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 
#    pathlib.Path(FRONT_DRAWINGS_DIR).mkdir(parents=True, exist_ok=True) 

#if __name__ == '__main__':
#    main()

