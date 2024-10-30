import { create } from 'zustand';

type State = {
  index?: number;
  id?: string;
  idList: string[];
  setId: (id: string | undefined) => void;
  setIndex: (index: number | undefined) => void;
  setIdList: (idList: string[]) => void;
};

export const useSelectAction = create<State>((set, get) => ({
  index: undefined,
  id: undefined,
  idList: [],
  setId(id) {
    if (id === undefined) {
      set({ id: undefined, index: undefined });
      return;
    }

    const state = get();
    const index = state.idList.findIndex((listId) => id === listId);
    if (index !== -1) {
      set({ index: index });
    } else {
      set({ index: undefined });
    }
    set({ id });
  },
  setIndex(index) {
    if (index === undefined) {
      set({ index: undefined, id: undefined });
      return;
    }

    const state = get();
    const id = state.idList[index];
    if (id) {
      set({ index, id });
    } else {
      set({ index: undefined, id: undefined });
    }
  },
  setIdList(idList) {
    const state = get();
    const index = idList.findIndex((id) => id === state.id);
    if (index !== -1) {
      set({ index: index, idList });
    } else {
      set({ index: undefined, idList });
    }
  },
}));
