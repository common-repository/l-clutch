import { useEffect, useRef } from 'react';
import { FC } from 'react';

type Props = {
  children: React.ReactNode;
};

export const PreventSubmitButton: FC<Props> = ({ children }) => {
  const wrapperRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    if (wrapperRef.current) {
      const buttons = wrapperRef.current.querySelectorAll('button');
      buttons.forEach((button) => {
        button.type = 'button';
      });
    }
  }, [wrapperRef]);

  return <div ref={wrapperRef}>{children}</div>;
};
