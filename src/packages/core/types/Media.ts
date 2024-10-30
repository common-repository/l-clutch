export type Media = {
  id: number;
  source_url: string;
  media_details: {
    width: number;
    height: number;
    file: string;
    filesize: number;
    sizes: {
      [key: string]: MediaSize;
      full: MediaSize;
      large: MediaSize;
      medium: MediaSize;
      thumbnail: MediaSize;
    };
  };
};

type MediaSize = {
  file: string;
  width: number;
  height: number;
  mime_type: string;
  source_url: string;
};

export type MediaList = {
  items: Media[];
  pages: number;
  total: number;
};
export type MediaListRequest = {
  media_type: 'image' | 'video' | 'text' | 'application' | 'audio';
  page: number;
  per_page: number;
};
