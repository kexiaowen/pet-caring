# CS2102-Group-8 (Pet Caring)

## Table of Contents
- [Project Requirements](#project-requirements)
- [Instructions](#instructions)
- [Appendix 1: Branching Workflow](#appendix-1--branching-workflow)
- [Appendix 2: Common Terminal Commands](#appendix-2--common-terminal-commands)
- [Appendix 3: Common Git Commands](#appendix-3--common-git-commands)

## Project Requirements

The system allows pet owners to search for care takers for their pet when they go out, travel or cannot take care of their pet for any reason. Both users and pets have a profile. Users of the service advertise their availability (when they can take care of a pet, for how long, the kind of pet they can take care of and other constraints and requirements) or browse and look for a care taker and bid. The care taker or the system (your choice) chooses the successful bid. Each user has an account. Administrators can create, modify and delete all entries. Please refer to dogvacay.com or similar sites for examples and data.

## Instructions

Replace the `petcaring` folder in your local `mappstack`. Restart the server using `manager-osx` or Terminal, and go to `localhost:8080/petcaring` to see the site.

Note that to see other sites at the current moment, such as the `search` site, you have to manually proceed to `localhost:8080/petcaring/` since routing has not quite been done yet.

## Appendix 1: Branching Workflow

This project uses a branching workflow, which essentially means that we should create a new branch every time we start work on a new feature/component.

The basic workflow can be summarised into the following steps:

1. Before starting a new feature, create a new branch

Go into the project directory using Terminal (and `cd`). Then, check that you are on the `master` branch by doing `git status`. If you are on the `master branch`, it will indicate that you are `On branch master`.

To create a new branch, do `git checkout -b <branchName>`, where `<branchName>` is the name of your new branch. It is recommended that you name the branch descriptively, i.e. related to the feature that you are currently working on. Note that a new branch with `<branchName>` will be created, and you will automatically be switched from the `master` branch to the `<branchName>` branch.

Note also that if you do this on another branch aside from the master branch, say, branch `search`, your new branch will include all the changes in branch `search` as well, which is probably not what you wanted.

2. Make changes within your local repository, and commit the changes

Make changes you need on the `<branchName>` branch. Add the changes by doing `git add <fileName>` or `git add *` (if you want to add everything), followed by `git commit -m "<commitMessage>"` to add a descriptive and short commit message for your changes. Alternatively, do `git commit`, then press `a` to enter `INSERT mode` before keying in your commit message. Exit `INSERT mode` by doing `ESC`, then `:wq`.

3. Push the branch to the remote repository

To push the branch to the remote repository, do `git push origin <branchName>`, or do `git push -u origin <branchName>`. The second option allows you to simply do `git push` without any parameters the next time you want to push the same branch to the remote repository.

4. Open a pull request

Proceed to GitHub, find your branch, and open a pull request. Wait for your group members to see, check and test your changes, before merging the branch into the remote repository.

5. After a successful merging, delete unwanted branches

After the branch has been merged successfully into `master`, the branch is now essentially useless and can be deleted. Delete the branch on the remote repository via GitHub. To delete the branch on your local repository, go to the Terminal, switch back to your `master` branch by doing `git checkout master`, and delete the branch by doing `git branch -d <branchName>` followed by `git branch -D <branchName>`.

6. Update your local repository

To sync your local repository with the remote repository, do `git pull` while on the `master` branch.

## Appendix 2: Common Terminal Commands
- `cd <folderName>` : change directory (folder) into another folder
- `cd ../` : go back to the outer folder
- `cd` : go to the root
- `ls` : see the files and folders in the current directory

## Appendix 3: Common Git Commands
- `git status` : check what branch you are on, what files are being tracked, and ready for commitment
- `git log` : show commit history for a branch
- `git log --graph` : show commit history for a branch in a nicer way
- `git checkout <branchName>` : switch to an existing branch
- `git checkout -b <branchName>` : create a new branch and switch to that branch
- `git branch` : lists branches in your local repository
- `git branch -v` : lists branches with latest commit details in your local repository
- `git branch -d <branchName>` : delete a branch
- `git add <fileName>` : stage files for commit
- `git commit <fileName>` : commit files
- `git commit <fileName> -m "<someMessage>"` : commit files with short commit message
- `git push origin <branchName>` : push a branch to the remote repository
- `git remote` : see all remotes
- `git remote -v` : see all remotes and the remote repository each remote is pointing to
- `git pull` : sync local repository with remote repository (auto merging of changes in remote repo with local repo)
- `git fetch` : get changes in remote repository without merging into your local repository
