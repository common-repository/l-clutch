import { useEffect } from 'react';
import { useState } from 'react';
import { useRouterStore } from '..';

export const usePagination = () => {
  const { page, setParams } = useRouterStore();

  const [pagination, setPagination] = useState({ pageIndex: (page ?? 1) - 1, pageSize: 10 });
  const [request, setRequest] = useState({ page: page ?? 1, limit: 10 });
  useEffect(() => {
    setRequest({ page: pagination.pageIndex + 1, limit: pagination.pageSize });
  }, [pagination]);

  useEffect(() => {
    setParams({ page: pagination.pageIndex + 1 }, true);
  }, [pagination.pageIndex]);

  return { pagination, setPagination, request };
};
