type Props = {
  children: React.ReactNode;
  title: string;
};

export const BlockFrame = ({ children, title }: Props) => {
  return (
    <div className="tw-outline-dashed tw-outline-2 tw-outline-offset-2 tw-outline-l-clutch-green tw-relative">
      <div className="tw-absolute -tw-top-6 -tw-right-1 tw-bg-l-clutch-green tw-text-white tw-text-xs tw-rounded-t tw-py-0.5 tw-px-2 tw-border-l-clutch-green tw-border-solid tw-border">
        {title}
      </div>
      {children}
    </div>
  );
};
