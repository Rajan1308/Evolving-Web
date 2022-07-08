import React from 'react';

import breadcrumbs from './breadcrumbs.twig';

import breadcrumbData from './breadcrumbs.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Breadcrumbs' };

export const BreadCrumbs = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: breadcrumbs({
          ...breadcrumbData,
        }),
      }}
    />
  );
};
