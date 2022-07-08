import React from 'react';
import { useEffect } from '@storybook/client-api';

import teamGrid from './team-grid.twig';

import teamGridData from './team-grid.yml';
import member from '../../02-molecules/team-member/team-member.yml';
import carousel from './team-grid';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/Team Grid' };

export const TeamGrid = () => {
  useEffect(() => {
    carousel.mount();
  }, []);
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: teamGrid({
          ...teamGridData,
          ...member,
        }),
      }}
    />
  );
};
