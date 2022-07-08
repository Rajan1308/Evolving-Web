import React from 'react';

import authorProfile from './author-profile.twig';

import authorProfileData from './author-profile.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Author profile' };

export const AuthorProfile = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: authorProfile({
          ...authorProfileData,
        }),
      }}
    />
  );
};
