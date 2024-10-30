import { AutoComplete, Form, Spin } from 'antd';
import { DefaultOptionType } from 'antd/es/select';

import { useSearch, LineActionField, Schemas } from '../..';
import { useState } from 'react';

export const UriActionField: LineActionField<Schemas['UriAction']> = ({ action, setAction, errors }) => {
  const [search, setSearch] = useState<string | undefined>();
  const { data, isLoading } = useSearch(search ? { search } : undefined);

  return (
    <Form.Item label="URL" validateStatus={errors?.uri ? 'error' : undefined} hasFeedback help={errors?.uri?.message}>
      <AutoComplete
        allowClear
        value={action.uri}
        placeholder="ページ名、またはURLを入力"
        onSearch={(search) => {
          if (search.length === 0) return;
          try {
            new URL(search);
          } catch (_) {
            setSearch(search);
          }
        }}
        onChange={(value) => {
          setAction({ ...action, uri: value });
        }}
        options={
          (isLoading
            ? [{ value: '', label: <Spin />, disabled: true }]
            : (data?.items || []).map((d) => ({
                value: d.url,
                label: d.title,
                disabled: false,
              }))) as DefaultOptionType[]
        }
      />
    </Form.Item>
  );
};
