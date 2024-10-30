import { useMemo, useState } from 'react';
import { TablePaginationConfig } from 'antd';
import { FilterValue } from 'antd/es/table/interface';

import { useRouterStore } from '..';

interface TableParams {
  pagination?: TablePaginationConfig;
  sortField?: string;
  sortOrder?: string;
  filters?: Record<string, FilterValue>;
}

export const useTableParams = () => {
  const { page, setParams } = useRouterStore();

  const [total, setTotal] = useState<number>();

  const tableParams = useMemo<TableParams>(
    () => ({
      pagination: {
        position: ['bottomCenter'],
        showTotal: (total, range) => `${range[0]}-${range[1]}/全${total}件`,
        current: page ?? 1,
        defaultPageSize: 10,
        total,
      },
    }),
    [page, total],
  );

  const setTableParams = (pagination: TablePaginationConfig) => {
    if (pagination) {
      setParams({ page: pagination.current }, true);
    }
    if (pagination?.total) {
      setTotal(pagination.total);
    }
  };

  const request = useMemo(() => {
    if (!tableParams.pagination) return;
    return {
      page: tableParams.pagination.current ?? 1,
      per_page: tableParams.pagination.pageSize ?? 10,
    };
  }, [page, tableParams.pagination]);

  return { tableParams, setTableParams, setTotal, request };
};
