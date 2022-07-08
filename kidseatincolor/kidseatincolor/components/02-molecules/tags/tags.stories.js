import React from 'react';

import tags from './tags.twig';

import tagsData from './tags.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Tags' };

export const Tags = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: tags({
          ...tagsData,
        }),
      }}
    />
  );
};
