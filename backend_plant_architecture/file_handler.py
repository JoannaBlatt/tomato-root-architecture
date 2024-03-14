import argparse
from sys import argv


def main():
    # parser = argparse.ArgumentParser()
    # parser.add_argument('--analyze', action='store_true')
    # parser.add_argument('--scaling', action='store_true')

    # args = parser.parse_args()

    # if args.analyze:
    #     analyze_arbors()
    # if args.scaling:
    #     write_scaling_dists()

    image_files = argv[1:]
    print(type(image_files))
    print(image_files)
    # if len(image_files) == 0:
    #     image_files = os.listdir(CLEANED_ROOT_NODES_DIR)
    # for fname in image_files:
    #     if 'Root_Nodes' in fname and fname.endswith('.csv'):
    #         raw_data_fname = '%s/%s' % (CLEANED_ROOT_NODES_DIR, fname)
    #         print(fname) #the first print line you see
    #         write_arbor_files_full(raw_data_fname, RECONSTRUCTIONS_DIR) #write_full_1

if __name__ == '__main__':
    main()